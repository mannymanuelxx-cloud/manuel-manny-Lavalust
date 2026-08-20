<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$student_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Desk | Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#151515; --paper:#fffdf7; --gold:#f8c52b; --soft:#fffaf0; --muted:#756f61; --line:#242424; }
        * { box-sizing:border-box; } body { margin:0; min-height:100vh; color:var(--ink); background:var(--paper); font-family:Manrope,sans-serif; }
        .shell { width:min(1080px,calc(100% - 32px)); margin:34px auto; background:#fff; border:2px solid var(--line); box-shadow:14px 14px 0 var(--gold); }
        header { height:88px; padding:0 30px; border-bottom:2px solid var(--line); display:flex; justify-content:space-between; align-items:center; }
        .brand { display:flex; align-items:center; gap:12px; color:var(--ink); text-decoration:none; font:700 17px Georgia,serif; }.mark { width:40px;height:40px;border:2px solid var(--line);border-radius:50%;background:var(--gold);display:grid;place-items:center;font:800 12px Manrope,sans-serif; }
        .back { color:var(--ink); border:1px solid var(--line); text-decoration:none; padding:10px 16px; font-size:13px; font-weight:800; }
        main { padding:70px; } h1 { margin:0 0 48px; font:400 64px/.95 "DM Serif Display",Georgia,serif; }
        .profile-grid { display:grid; grid-template-columns:245px 1fr; gap:46px; align-items:start; }
        .identity { padding:28px 24px; border:2px solid var(--line); box-shadow:9px 9px 0 #ffe58a; }
        .avatar { width:142px;height:142px;border-radius:50%;margin:0 auto 24px;border:2px solid var(--line);background:var(--gold);display:grid;place-items:center;font:400 52px "DM Serif Display",Georgia,serif; }
        .identity h2 { margin:0 0 12px; font:400 25px/1.05 "DM Serif Display",Georgia,serif; }.identity p { margin:0; padding:10px 12px; background:var(--ink); color:var(--gold); font-size:11px; line-height:1.25; font-weight:800; letter-spacing:.08em; }
        .details { display:grid; grid-template-columns:1fr 1fr; gap:12px; }.detail { min-height:86px; padding:18px 20px; border:1px solid #eadfbe; background:var(--soft); }.detail.wide { grid-column:1/-1; }.label { display:block; color:var(--muted); font-size:11px; font-weight:800; letter-spacing:.08em; margin-bottom:10px; }.value { font-size:16px; font-weight:800; overflow-wrap:anywhere; }.about { margin:25px 0 0; max-width:630px; color:var(--muted); font:17px/1.55 Georgia,serif; }
        @media (max-width:760px) { header { height:76px; padding:0 18px; }.brand { font-size:13px; }.back { padding:8px 11px; } main { padding:48px 28px 56px; } h1 { font-size:52px; margin-bottom:34px; }.profile-grid { grid-template-columns:1fr; gap:32px; }.identity { max-width:280px; }.details { grid-template-columns:1fr; }.detail.wide { grid-column:auto; } }
    </style>
</head>
<body>
    <div class="shell">
        <header>
            <a class="brand" href="<?= htmlspecialchars($student_url . '/student') ?>"><span class="mark">SD</span> STUDENT DESK</a>
            <a class="back" href="<?= htmlspecialchars($student_url . '/student') ?>">Home</a>
        </header>
        <main>
            <h1>Student profile</h1>
            <div class="profile-grid">
                <aside class="identity">
                    <div class="avatar">S</div>
                    <h2><?= htmlspecialchars($student['name']) ?></h2>
                    <p><?= htmlspecialchars($student['course']) ?></p>
                </aside>
                <section>
                    <div class="details">
                        <div class="detail"><span class="label">Student ID</span><span class="value"><?= htmlspecialchars($student['student_id']) ?></span></div>
                        <div class="detail"><span class="label">Name</span><span class="value"><?= htmlspecialchars($student['name']) ?></span></div>
                        <div class="detail"><span class="label">Course</span><span class="value"><?= htmlspecialchars($student['course']) ?></span></div>
                        <div class="detail"><span class="label">Year level</span><span class="value"><?= htmlspecialchars($student['year']) ?></span></div>
                        <div class="detail"><span class="label">Section</span><span class="value"><?= htmlspecialchars($student['section']) ?></span></div>
                        <div class="detail"><span class="label">Email</span><span class="value"><?= htmlspecialchars($student['email']) ?></span></div>
                        <div class="detail wide"><span class="label">Address</span><span class="value"><?= htmlspecialchars($student['address']) ?></span></div>
                        <div class="detail"><span class="label">Contact</span><span class="value"><?= htmlspecialchars($student['contact']) ?></span></div>
                    </div>
                    <p class="about"><?= htmlspecialchars($student['about']) ?></p>
                </section>
            </div>
        </main>
    </div>
</body>
</html>