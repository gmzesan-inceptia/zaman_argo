<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.M. Zesan - Laravel Developer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 50%, #c7d2fe 100%);
            color: #1e293b;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Subtle background pattern */
        .grid-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            background-image: 
                linear-gradient(rgba(30, 41, 59, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 41, 59, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: grid-move 20s linear infinite;
            z-index: 0;
        }

        @keyframes grid-move {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Gradient orbs - light version */
        .gradient-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.2;
            z-index: 0;
            animation: float 15s infinite ease-in-out;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: linear-gradient(45deg, rgba(137, 114, 219, 0.25), rgba(109, 40, 217, 0.25));
            top: -200px;
            right: -200px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, rgba(109, 40, 217, 0.2), rgba(79, 70, 229, 0.2));
            bottom: -150px;
            left: -150px;
            animation-delay: -7s;
        }

        .orb-3 {
            width: 250px;
            height: 250px;
            background: linear-gradient(45deg, rgba(79, 70, 229, 0.15), rgba(137, 114, 219, 0.15));
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, -30px) rotate(90deg); }
            50% { transform: translate(-20px, 20px) rotate(180deg); }
            75% { transform: translate(-30px, -10px) rotate(270deg); }
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            padding: 10px 0;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            margin-bottom: 20px;
            border-radius: 0 0 15px 15px;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            text-decoration: none;
            background: linear-gradient(45deg, #8972db, #6d28d9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #8972db;
        }

        .cta-button {
            background: linear-gradient(45deg, #8972db, #6d28d9);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(137, 114, 219, 0.4);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        /* Left Side - Introduction */
        .intro-section {
            padding: 20px 0;
        }

        .greeting {
            font-size: 1.5rem;
            color: #64748b;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .name {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #0f172a, #8972db, #6d28d9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .title {
            font-size: 1.8rem;
            color: #8972db;
            font-weight: 600;
        }

        /* Right Side - Code Window */
        .code-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .code-window {
            width: 100%;
            max-width: 500px;
            background: #1e293b;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            border: 1px solid #334155;
            margin-bottom: 30px;
        }

        .window-header {
            background: #334155;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .window-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .dot-red { background: #ef4444; }
        .dot-yellow { background: #f59e0b; }
        .dot-green { background: #10b981; }

        .window-title {
            color: #cbd5e1;
            font-size: 0.9rem;
            margin-left: 15px;
            font-weight: 500;
        }

        .code-content {
            padding: 25px;
            background: #1e293b;
            font-family: 'Monaco', 'Menlo', monospace;
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .code-line {
            color: #cbd5e1;
            margin-bottom: 8px;
            opacity: 0;
            animation: typewriter 0.8s ease forwards;
        }

        .code-line:nth-child(1) { animation-delay: 0.5s; }
        .code-line:nth-child(2) { animation-delay: 1s; }
        .code-line:nth-child(3) { animation-delay: 1.5s; }
        .code-line:nth-child(4) { animation-delay: 2s; }
        .code-line:nth-child(5) { animation-delay: 2.5s; }
        .code-line:nth-child(6) { animation-delay: 3s; }

        @keyframes typewriter {
            0% {
                opacity: 0;
                transform: translateX(-10px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .keyword { color: #c084fc; }
        .string { color: #34d399; }
        .function { color: #60a5fa; }
        .comment { color: #6b7280; }

        /* Admin Section - Transparent Card */
        .admin-section {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 40px;
            margin-top: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 30px rgba(137, 114, 219, 0.1);
            grid-column: 1 / -1;
        }

        .admin-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #8972db;
        }

        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .admin-item {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid #8972db;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .admin-item:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(137, 114, 219, 0.15);
        }

        .admin-label {
            font-size: 0.9rem;
            color: #8972db;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .admin-value {
            color: #1e293b;
            font-family: 'Monaco', monospace;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .admin-link {
            color: #8972db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .admin-link:hover {
            color: #6d28d9;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                overflow-y: auto;
                height: auto;
                min-height: 100vh;
            }

            .main-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .nav-links {
                gap: 15px;
            }
            
            .nav-link {
                font-size: 0.9rem;
            }
            
            .code-window {
                max-width: 100%;
            }

            .admin-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="grid-background"></div>
    <div class="gradient-orb orb-1"></div>
    <div class="gradient-orb orb-2"></div>
    <div class="gradient-orb orb-3"></div>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <nav class="nav">
                <a href="#" class="logo">
                    <img src="{{ asset('images/me.png') }}" alt="G.M. Zesan Logo" style="height: 80px; vertical-align: middle;">
                </a>
                <div class="nav-links">
                    @auth
                        <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="cta-button">Register</a>
                        @endif
                    @endauth
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Left Side - Introduction -->
            <div class="intro-section">
                <p class="greeting">Hi, I am</p>
                <h1 class="name">G.M. Zesan</h1>
                <h2 class="title">Laravel Developer</h2>
            </div>

            <!-- Right Side - Code Window -->
            <div class="code-section">
                <div class="code-window">
                    <div class="window-header">
                        <div class="window-dot dot-red"></div>
                        <div class="window-dot dot-yellow"></div>
                        <div class="window-dot dot-green"></div>
                        <div class="window-title">UserController.php</div>
                    </div>
                    <div class="code-content">
                        <div class="code-line"><span class="keyword">class</span> <span class="function">UserController</span> <span class="keyword">extends</span> Controller</div>
                        <div class="code-line">{</div>
                        <div class="code-line">    <span class="keyword">public function</span> <span class="function">index</span>()</div>
                        <div class="code-line">    {</div>
                        <div class="code-line">        <span class="keyword">return</span> <span class="string">'Clean & Efficient Code'</span>;</div>
                        <div class="code-line">    }</div>
                    </div>
                </div>
            </div>

            <!-- Admin Access Section - Full Width -->
            <div class="admin-section">
                <h2 class="admin-title">Development Access</h2>
                <div class="admin-grid">
                    <div class="admin-item">
                        <div class="admin-label">Admin URL</div>
                        <div class="admin-value">
                            <a href="http://127.0.0.1:8000/login" class="admin-link">http://127.0.0.1:8000/login</a>
                        </div>
                    </div>
                    <div class="admin-item">
                        <div class="admin-label">Email</div>
                        <div class="admin-value">gmzesan7767@gmail.com</div>
                    </div>
                    <div class="admin-item">
                        <div class="admin-label">Password</div>
                        <div class="admin-value">12345678aA</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>