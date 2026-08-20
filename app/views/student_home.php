<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$student_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manny's Student Desk | Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#151515; --paper:#f4f4f4; --accent:#bdbdbd; --accent-dark:#444; --accent-gradient:linear-gradient(135deg,#ffffff 0%,#bdbdbd 52%,#555 100%); --muted:#666; --line:#242424; }
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; color:var(--ink); background:linear-gradient(135deg,#f8f8f8 0%,#d1d1d1 52%,#777 100%); font-family:Manrope, sans-serif; }
        body:before, body:after { content:""; position:fixed; border:1px solid var(--accent); border-radius:50%; pointer-events:none; }
        body:before { width:165px; height:165px; top:-65px; left:-48px; }
        body:after { width:145px; height:145px; right:-52px; bottom:-68px; background:#e1e1e1; }
        .shell { position:relative; width:min(1090px, calc(100% - 32px)); margin:38px auto; background:#fff; border:2px solid var(--line); box-shadow:14px 14px 0 var(--accent); }
        header { height:90px; display:flex; align-items:center; justify-content:space-between; padding:0 30px; border-bottom:2px solid var(--line); }
        .brand { display:flex; align-items:center; gap:12px; font-family:Georgia, serif; font-size:17px; font-weight:700; }
        .mark { width:40px; height:40px; display:grid; place-items:center; border:2px solid var(--line); border-radius:50%; background:var(--accent-gradient); font-weight:800; font-size:12px; }
        .home-link, .profile-link { color:var(--ink); text-decoration:none; border:1px solid var(--line); padding:10px 18px; font-weight:800; font-size:13px; }
        main { display:grid; grid-template-columns:1.05fr .95fr; gap:72px; padding:80px 70px 72px; align-items:center; }
        .eyebrow { display:inline-block; padding:8px 12px; background:var(--accent-gradient); font-size:12px; letter-spacing:.12em; font-weight:800; }
        h1, h2 { font-family:"DM Serif Display", Georgia, serif; font-weight:400; line-height:.94; }
        h1 { font-size:78px; max-width:430px; margin:25px 0 24px; }
        .intro { max-width:455px; color:var(--muted); font-family:Georgia, serif; font-size:18px; line-height:1.55; }
        .meta { display:flex; align-items:center; gap:10px; margin-top:34px; font-size:12px; letter-spacing:.08em; font-weight:800; }
        .dot { width:9px; height:9px; border-radius:50%; background:var(--accent-dark); }
        .access { position:relative; border:2px solid var(--line); padding:31px; box-shadow:10px 10px 0 var(--accent); }
        .access:before { content:"01"; position:absolute; top:-14px; right:16px; padding:6px 9px; color:#fff; background:var(--ink); font-size:12px; font-weight:800; }
        h2 { font-size:34px; margin:0 0 14px; }
        .access p { color:var(--muted); font-family:Georgia, serif; line-height:1.5; margin:0 0 26px; }
        .name-input { width:100%; padding:15px; margin-bottom:13px; color:var(--ink); background:#fff; border:1px solid var(--line); font:600 14px Manrope, sans-serif; }
        .open { display:block; width:100%; padding:16px; color:var(--ink); background:var(--accent-gradient); border:2px solid var(--line); text-align:center; text-decoration:none; font-weight:800; cursor:pointer; }
        @media (max-width:760px) { .shell { margin:18px auto; } header { padding:0 18px; height:76px; } .brand { font-size:13px; } .home-link { padding:8px 12px; } main { grid-template-columns:1fr; gap:45px; padding:54px 28px 60px; } h1 { font-size:61px; } }
    </style>
</head>
<body>
    <div class="shell">
        <header>
            <div class="brand"><span class="mark">MSD</span> MANNY'S STUDENT DESK</div>
            <a class="home-link" href="<?= htmlspecialchars($student_url . '/student') ?>">Home</a>
        </header>
        <main>
            <section>
                <span class="eyebrow">STUDENT INFORMATION</span>
                <h1>Welcome,<br>student<br>user.</h1>
                <p class="intro">A bright little corner for the essential details of a technology student.</p>
                <p class="meta"><span class="dot"></span><?= htmlspecialchars($student['course']) ?> / <?= htmlspecialchars($student['section']) ?> / <?= htmlspecialchars($student['year']) ?></p>
            </section>
            <section class="access">
                <h2>Profile access</h2>
                <p>Enter any name to continue to the student profile.</p>
                <form method="post" action="<?= htmlspecialchars($student_url . '/student') ?>">
                    <input class="name-input" type="text" name="student_name" placeholder="Enter your name" aria-label="Enter your name" required>
                    <button class="open" type="submit">Open student profile</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>