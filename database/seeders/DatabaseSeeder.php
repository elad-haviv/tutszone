<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the legacy-schema tables with demo content. Idempotent:
     * skips if the database is already seeded.
     */
    public function run(): void
    {
        if (Page::count() > 0 || Category::count() > 0) {
            return;
        }

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@tutszone.haviv.pro',
            'password' => Hash::make(bin2hex(random_bytes(12))),
            'group' => 1,
        ]);

        Page::create([
            'name' => 'about',
            'title' => 'About TutsZone',
            'content' => '<p>TutsZone is a place to learn web development, one lesson at a time.</p>',
            'show' => true,
        ]);

        Page::create([
            'name' => 'contact',
            'title' => 'Contact',
            'content' => '<p>Reach us through the contact form.</p>',
            'show' => true,
        ]);

        $webDev = Category::create([
            'name' => 'web-development',
            'title' => 'Web Development',
            'description' => 'Courses about building for the web.',
            'picture' => null,
            'parent' => 0,
        ]);

        $frontend = Category::create([
            'name' => 'frontend',
            'title' => 'Frontend',
            'description' => 'HTML, CSS and JavaScript.',
            'picture' => null,
            'parent' => $webDev->id,
        ]);

        $html = Course::create([
            'name' => 'html-basics',
            'title' => 'HTML Basics',
            'description' => 'Learn the building blocks of every web page: elements, attributes and document structure.',
            'picture' => null,
            'category' => $frontend->id,
            'author_id' => $admin->id,
            'order' => 1,
        ]);

        Lesson::create([
            'name' => 'html-basics-your-first-page',
            'title' => 'Your first page',
            'lead' => 'Create, save and open an HTML document.',
            'content' => '<p>Every web page starts as a plain text file. Create a file named index.html and open it in your browser.</p>',
            'course' => $html->id,
            'picture' => null,
            'order' => 1,
            'auth_date' => time(),
            'addons' => null,
        ]);

        Lesson::create([
            'name' => 'html-basics-elements-and-attributes',
            'title' => 'Elements and attributes',
            'lead' => 'The vocabulary of HTML.',
            'content' => '<p>HTML documents are trees of elements. Each element can carry attributes that configure it.</p>',
            'course' => $html->id,
            'picture' => null,
            'order' => 2,
            'auth_date' => time(),
            'addons' => null,
        ]);
    }
}
