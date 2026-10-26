<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The controllers and views in this app use the legacy TutsZone schema
 * (name/show/parent/picture/lead/auth_date), but the migrations shipped in
 * the repo created a newer, never-completed schema (slug/contents/nav_visible)
 * that the running code cannot query. This migration drops the mismatched
 * content tables and installs the schema the application actually uses.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Drop every content table (new schema and any leftovers) in
        // FK-safe order, then rebuild only what the app uses.
        foreach ([
            'completions', 'course_views', 'reviews', 'orders', 'comments',
            'enrollments', 'follows', 'collections', 'lessons', 'sections',
            'courses', 'categories', 'pages',
        ] as $table) {
            Schema::dropIfExists($table);
        }

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title');
            $table->text('content');
            $table->boolean('show')->default(true);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->integer('parent')->default(0);
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('picture')->nullable();
            $table->integer('category')->default(0);
            $table->foreignId('author_id')->constrained('users');
            $table->integer('order')->nullable();
            $table->timestamps();
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title');
            $table->text('lead')->nullable();
            $table->text('content');
            $table->integer('course');
            $table->string('picture')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedInteger('auth_date')->nullable();
            $table->string('addons')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('author')->index();
            $table->integer('lesson')->index();
            $table->text('content');
            $table->unsignedInteger('auth_date')->nullable();
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });

        // Pivot used by Category::courses() belongsToMany('collections')
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('course_id')->index();
            $table->timestamps();
        });

        // Views and AdminController check Auth::user()->group
        if (!Schema::hasColumn('users', 'group')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('group')->default(0);
            });
        }
    }

    public function down(): void
    {
        // No rollback: the dropped tables were unusable by the app anyway.
    }
};
