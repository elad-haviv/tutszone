<div style="direction: rtl;
            text-align: right;
            padding: 2em;
            background: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);">
    <h1 style="text-align: center;">פנייה חדשה התקבלה למערכת האתר TutsZone</h1>

    <div style="padding: 2em;
            background: #EFEFEF;">
        <h2>פרטי השולח</h2>

        <div>
            <ins style="margin-right: 15px;">שם מלא:</ins>
            <strong>{{ $name }}</strong>
        </div>
        <div>
            <ins style="margin-right: 15px;">כתובת דוא"ל:</ins>
            <strong>{{ $email }}</strong>
        </div>
    </div>
    <div style="margin-top: 15px padding: 2em;
            background: #EFEFEF;">
        <h2>{{ $subject }}</h2>

        <p>
            {{ $msg }}
        </p>
    </div>
</div>