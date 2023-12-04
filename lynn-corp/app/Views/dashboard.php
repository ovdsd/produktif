<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lynn corp.</title>
    <link href="image/logo.png" rel="Icon" type="imagr/x-icon">
    <!--MATERIAL CDN-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--STYLESHEET-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,600;0,700;0,800;1,700;1,800&family=Ubuntu:wght@500&display=swap');

        /* -------------- ROOT VARIABLE --------------*/
        :root {
            --color-primary: #05ffc0;
            --color-danger: #ff4949;
            --color-success: #57ff65;
            --color-warning: #ffe357;
            --color-white: #fff;
            --color-info-dark: #666666;
            --color-info-light: #cedfdb;
            --color-dark: #363949;
            --color-light: #f6f6f9;
            --color-primary-variant: #ff59bd;
            --color-dark-variant: #677483;
            --color-background: #f6f6f9;

            --card-border-radius: 2rem;
            --border-radius-1: 0.4rem;
            --border-radius-2: 0.8rem;
            --border-radius-3: 1.2rem;

            --card-padding: 1.8rem;
            --padding: 1.8rem;

            --box-shadow: 0 2rem 3rem var(--color-info-light);
        }

        .dark-theme-variables {
            --color-background: #181a1e;
            --color-white: #202528;
            --color-dark: #edeffd;
            --color-dark-variant: #a3bdcc;
            --color-light: rgba(0, 0, 0, 0.4);
            --box-shadow: 0 2rem 3rem var(--color-light)
        }

        * {
            margin: 0;
            padding: 0;
            outline: 0;
            appearance: none;
            border: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
            zoom: 98.7%;
        }

        html {
            font-size: 14px;
        }

        body {
            width: 100vw;
            height: 100vh;
            font-family: poppins, sans-serif;
            font-size: 0.88rem;
            background: var(--color-background);
            user-select: none;
            overflow-x: hidden;
            color: var(--color-dark);
        }

        .container {
            display: grid;
            width: 96%;
            margin: auto;
            gap: 1.8rem;
            grid-template-columns: 14rem auto 23rem;
        }

        a {
            color: var(--color-dark);
        }

        img {
            display: block;
            width: 100%;
        }

        h1 {
            font-weight: 800;
            font-size: 1.8rem;
        }

        h2 {
            font-size: 1.4rem;
        }

        h3 {
            font-size: 0.87rem;
        }

        h4 {
            font-size: 0.8rem;
        }

        h5 {
            font-size: 0.77rem;
        }

        small {
            font-size: 0.75rem;
        }

        .details {
            text-decoration: underline;
            color: var(--color-dark);
        }

        .profile-photo {
            width: 2.8rem;
            height: 2.8rem;
            border-radius: 50%;
            overflow: hidden;
        }

        .text-muted {
            color: var(--color-info-dark)
        }

        p {
            color: var(--color-dark-variant);
        }

        b {
            color: var(--color-dark-variant);
        }

        .primary {
            color: var(--color-primary);
        }

        .danger {
            color: var(--color-danger);
        }

        .warning {
            color: var(--color-warning);
        }

        .success {
            color: var(--color-success);
        }

        aside {
            height: 100vh;
        }

        aside .top {

            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.4rem;
        }

        aside .logo {
            display: flex;
            gap: 0.8rem;
        }

        aside .logo img {
            width: 2rem;
            height: 2rem;
        }

        aside .close {
            display: none;
        }

        aside .logo {
            font-style: italic;
        }

        /*------SIDE BAR------*/
        aside .sidebar {
            display: flex;
            flex-direction: column;
            height: 86vh;
            position: relative;
            top: 3rem;
        }

        aside h3 {
            font-weight: 500;
        }

        aside .sidebar a {
            display: flex;
            color: var(--color-info-dark);
            margin-left: 2rem;
            gap: 1rem;
            align-items: center;
            height: 3.7rem;
            transition: all 300ms ease;
        }

        aside .sidebar a span {
            font-size: 1.6rem;
            transition: all 300ms ease;
        }

        aside .sidebar a:last-child {
            position: absolute;
            bottom: 2rem;
            width: 100%;
        }

        aside .sidebar a.active {
            background: var(--color-light);
            color: var(--color-primary);
            margin: 0;
        }

        aside .sidebar a.active:before {
            content: "";
            width: 6px;
            height: 100%;
            background: var(--color-primary);
        }

        aside .sidebar a.active span {
            color: var(--color-primary);
            margin-left: calc(1rem - 3px);
        }

        aside .sidebar a:hover {
            color: var(--color-primary);
        }

        aside .sidebar a:hover span {
            margin-left: 1rem;
        }

        aside .sidebar .message-count {
            background: var(--color-danger);
            color: var(--color-white);
            padding: 2px 10px;
            font-size: 11px;
            border-radius: var(--border-radius-1);
        }

        /*-------------MAIN SECTION-------------*/

        main {
            margin-top: 1.4rem;
            transform: translate(0px 10px);
        }

        main .date {
            display: inline-block;
            background: var(--color-light);
            border-radius: var(--border-radius-1);
            margin-top: 1rem;
            padding: 0.5rem 1.6rem;
        }

        main .date input[type='date'] {
            background: transparent;
            color: var(--color-dark);
        }

        main .insights {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.6rem;
        }

        main .insights>div {
            background: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        main .insights>div:hover {
            box-shadow: none;
        }

        main .insights>div span {
            background: var(--color-primary);
            padding: 0.5rem;
            border-radius: 50%;
            color: var(--color-white);
            font-size: 2rem;
        }

        main .insights>div.expenses span {
            background: var(--color-warning);
        }

        main .insights>div.income span {
            background: var(--color-success);
        }

        main .insights>div .middle {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        main .insights h3 {
            margin: 1rem 0 0.6rem;
            font-size: 1rem;
        }

        main .insights .progress {
            position: relative;
            width: 92px;
            height: 92px;
            border-radius: 50%;
        }

        main .insights svg {
            width: 7rem;
            height: 7rem;
        }

        main .insights svg circle {
            fill: none;
            stroke: var(--color-primary);
            stroke-width: 14;
            stroke-linecap: round;
            transform: translate(5px, 5px);
            stroke-dasharray: 110;
            stroke-dashoffset: 92;
        }

        main .insights .sales svg circle {
            stroke-dashoffset: -30%;
            stroke-dasharray: 200;
        }

        main .insights .expenses svg circle {
            stroke-dashoffset: 20;
            stroke-dasharray: 80;
            stroke: var(--color-danger);
        }

        main .insights .income svg circle {
            stroke-dashoffset: 110;
            stroke-dasharray: 35;
            stroke: var(--color-success);
        }

        main .insights .progress .number {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main .insights small {
            display: block;
            margin-top: 1.3rem;
        }

        /*---------------------RECENT ORDERS---------------------*/
        main .recent-orders {
            margin-top: 2rem;
        }

        main .recent-orders h2 {
            margin-bottom: 0.8rem;
        }

        main .recent-orders table {
            background: var(--color-white);
            width: 100%;
            border-radius: var(--card-border-radius);
            padding: var(--card-padding);
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        main .recent-orders table:hover {
            box-shadow: none;
        }

        main table tbody td {
            height: 2.8rem;
            border-bottom: 1px solid var(--color-light);
            color: var(--color-dark-variant);
        }

        main table tbody tr:last-child td {
            border: none;
        }

        main a {
            text-align: center;
            display: block;
            margin: 1rem auto;
            color: var(--color-primary);
        }

        /*--------------END OF THE RECENT ORDERS----------------*/
        /*--------------START OF THE RECENT UPDATES----------------*/

        .right {
            margin-top: 1.4rem;
        }

        .right .top {
            display: flex;
            justify-content: end;
            gap: 2rem;
        }

        .right .top button {
            display: none;
        }

        .right .theme-toggle {
            background: var(--color-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 1.6rem;
            width: 4.2rem;
            cursor: pointer;
            border-radius: var(--border-radius-1);
        }

        .right .theme-toggle span {
            font-size: 1.2rem;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .right .theme-toggle span.active {
            background: var(--color-primary);
            color: white;
            border-radius: var(--border-radius-1);
        }

        .right .top .profile {
            display: flex;
            gap: 2rem;
            text-align: right;
        }

        /*----------END OF TOP----------*/
        /*----------START OF THE UPDATES-----------*/

        .right .recent-updates {
            margin-top: 1rem;
        }

        .right .recent-updates h2 {
            margin-bottom: 0.8rem;
        }

        .right .recent-updates .updates {
            background: var(--color-white);
            padding: var(--padding);
            border-radius: var(--card-border-radius);
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        .right .recent-updates .updates:hover {
            box-shadow: none;
        }

        .right .recent-updates .updates .update {
            display: grid;
            grid-template-columns: 2.6rem auto;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        /*-------------END OF THE TOP---------------*/
        /*--------------START OF THE SMALL LAPTOPS---------------*/

        @media screen and (max-width: 1200px) {
            .container {
                width: 94%;
                grid-template-columns: 7rem auto 13rem;
            }

            aside .logo h2 {
                display: none;
            }

            aside .sidebar h3 {
                display: none;
            }

            aside .sidebar a {
                width: 5.6rem;
            }

            aside .sidebar a:last-child {
                position: relative;
                margin-top: 1.8rem;
            }

            main .insights {
                grid-template-columns: 1fr;
                gap: 0;
            }

            main .recent-orders {
                width: 94%;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                margin: 2rem 0 0 8.8rem;
            }

            main .recent-orders table {
                width: 83vw;

            }

            main table thead tr th:last-child,
            main table thead tr th:first-child {
                display: none;
            }

            main table tbody tr th:last-child,
            main table tbody tr th:first-child {
                display: none;
            }
        }

        /*-------------END OF THE SMALL LAPTOPS---------------*/
        /*--------------START OF THE HANDPHONES---------------*/

        @media screen and (max-width: 768px) {
            .container {
                width: 100%;
                grid-template-columns: 1fr;
            }

            aside {
                position: fixed;
                left: -100%;
                background: var(--color-white);
                width: 18rem;
                z-index: 3;
                box-shadow: 1rem 3rem 4rem var(--color-info-light);
                height: 100vh;
                padding-right: var(--card-padding);
                display: none;
                animation: showMenu 400ms ease forwards;
            }

            @keyframes showMenu {
                to {
                    left: 0;
                }
            }

            aside .logo {
                margin-left: 1rem;
            }

            aside .logo h2 {
                display: inline;
            }

            aside .sidebar h3 {
                display: inline;
            }

            aside .sidebar a {
                width: 100%;
                bottom: 5rem;
            }

            aside .close {
                display: inline-block;
                cursor: pointer;
            }

            main {
                margin-top: 8rem;
                padding: 0 1rem;
            }

            main .recent-orders {
                position: relative;
                margin: 3rem 0 0 0;
                width: 100%;
            }

            main .recent-orders table {
                width: 100%;
                margin: 0;
            }

            .right {
                width: 94%;
                margin: 0 auto 4rem;
            }

            .right .top {
                position: fixed;
                top: 0;
                left: 0;
                align-items: center;
                padding: 0 0.8rem;
                height: 4.6rem;
                background: var(--color-white);
                width: 100%;
                margin: 0;
                z-index: 2;
                box-shadow: 0 1rem 1rem var(--color-light);
            }

            .right .top .theme-toggle {
                width: 4.4rem;
                position: absolute;
                left: 66%;
            }

            .right .profile .info {
                display: none;
            }

            .right .profile .profile-photo {
                display: flex;
                position: relative;
                margin-left: 30rem;
            }

            .right .top button {
                display: inline-block;
                background: transparent;
                cursor: pointer;
                color: var(--color-dark);
                position: absolute;
                left: 1rem;
            }

            .right .top button span {
                font-size: 2rem;
            }
        }

        .button-35 {
            align-items: center;
            background-color: #fff;
            border-radius: 7px;
            box-shadow: transparent 0 0 0 3px, rgba(18, 18, 18, .1) 0 6px 20px;
            box-sizing: border-box;
            color: #121212;
            cursor: pointer;
            display: inline-flex;
            flex: 1 1 auto;
            font-family: Inter, sans-serif;
            font-size: 1rem;
            font-weight: 700;
            justify-content: center;
            line-height: 1;
            margin: 0;
            margin-bottom: 10px;
            outline: none;
            padding: 0.5rem 0.5rem;
            text-align: center;
            text-decoration: none;
            transition: box-shadow .2s, -webkit-box-shadow .2s;
            white-space: nowrap;
            border: 0;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-35:hover {
            box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="https://cdn.discordapp.com/attachments/961820020302815292/1168060559137189978/logo.png?ex=6550642a&is=653def2a&hm=a031bfdda83c0588d7a7f380075da162ff199bec734681b497da10585c89bd97&">
                    <h2>LYNN <span class="warning">CORP.</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#" class="active a-dashboard" data-value="dashboard">
                    <span class="material-icons-sharp">grid_view </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="a-customers" data-value="customers">
                    <span class="material-icons-sharp">person_outline </span>
                    <h3>Customers</h3>
                </a>
                <a href="#" class="a-orders" data-value="orders">
                    <span class="material-icons-sharp">receipt_long </span>
                    <h3>Orders</h3>
                </a>
                <a href="#" class="a-analytics" data-value="analytics">
                    <span class="material-icons-sharp">show_chart </span>
                    <h3>Analytics</h3>
                </a>
                <a href="#" class="a-message" data-value="message">
                    <span class="material-icons-sharp">email </span>
                    <h3>Message</h3>
                    <span class="message-count">17</span>
                </a>
                <a href="#" class="a-reports" data-value="reports">
                    <span class="material-icons-sharp">error </span>
                    <h3>Reports</h3>
                </a>
                <?php
                $userRole = session()->get('user_role');

                if ($userRole == 'Developer') {
                    echo '
        <a href="#" class="a-projectass" data-value="projectass">
            <span class="material-icons-sharp">add </span>
            <h3>Project Assignment</h3>
        </a>';
                } elseif ($userRole == 'Manager') {
                    echo '
        <a href="#" class="a-managedev" data-value="managedev">
            <span class="material-icons-sharp">add </span>
            <h3>Manage Developer</h3>
        </a>';
                }
                ?>
                <a href="#" class="a-settings" data-value="settings">
                    <span class="material-icons-sharp">settings </span>
                    <h3>Settings</h3>
                </a>
                <a href="/logout">
                    <span class="material-icons-sharp danger">logout </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!--AKHIR DARI ASIDE-->
        <main id="dashboard">
            <h1>Dashboard</h1>

            <div class="date">
                <input type="date">
            </div>

            <div class="insights">
                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Projects</h3>
                            <h1 id="total"></h1>
                        </div>
                    </div>
                </div>
                <!--AKHIR DARI SALES-->
                <div class="expenses">
                    <span class="material-symbols-outlined">progress_activity</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Ongoing Project</h3>
                            <h1 id="ongoing"></h1>
                        </div>
                    </div>
                </div>
                <!--AKHIR DARI EXPENSES-->
                <div class="income">
                    <span class="material-symbols-outlined">
                        new_releases
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Finished Project</h3>
                            <h1 id="finish"></h1>
                        </div>
                    </div>
                </div>
                <!--AKHIR DARI INCOME-->
            </div>
            <!--AKHIR OF INSIGHTS-->
            <!--AWAL DARI RECENT-ORDERS-->
            <div class="recent-orders order">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Project ID</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <a id="showhide" href="#">Show All</a>
            </div>
        </main>
        <!--AKHIR DARI MAIN-->
        <!--AWAL DARI CUSTOMERS-->
        <main id="customers" style="display:none;">
            <div class="recent-orders client">
                <h2>Customers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Customers Name</th>
                            <th>Last Project Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- AKHIR DARI CUSTOMERS -->
        <!--AWAL DARI ORDERS-->
        <main id="orders" style="display:none;">
            <div class="recent-orders orderss">
                <h2>Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Project ID</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- AKHIR DARI ORDERS -->
        <!--AWAL DARI CUSTOMERS-->
        <main id="customers" style="display:none;">
            <div class="recent-orders client">
                <h2>Customers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Customers Name</th>
                            <th>Last Project Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- AKHIR DARI CUSTOMERS -->
        <!--AWAL DARI MANAGE DEV-->
        <main id="managedev" style="display:none;">
            <div class="recent-orders managedev">
                <h2>Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Developer Id</th>
                            <th>Developer Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- AKHIR DARI MANAGE DEV -->
        <!--AWAL DARI RIGHT SIDE-->
        <div class="right">
            <!--AWAL DARI TOP-->
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggle">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b id="nama">
                                <?= session()->get('user_fn') ?>
                            </b></p>
                        <small class="text-muted">
                            <?= session()->get('user_role') ?>
                        </small>
                    </div>
                    <div class="profile-photo">
                        <img src="https://cdn.discordapp.com/attachments/961820020302815292/1168161847325765724/logo.png?ex=6550c27f&is=653e4d7f&hm=a9c188d04bbd4d17af4b5113d6b33d136d31fef83c8f37c487eaff63314d71b2&">
                    </div>
                </div>
            </div>
            <!--AKHIR DARI TOP-->
            <!--AWAL DARI UPDATES-->
            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <span class="material-icons-sharp">account_circle</span>
                        </div>
                        <div class="message">
                            <p><b>Lynn</b> Finished Website | Project ID W0008</p>
                            <small class="text-muted">2 Hours Ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <!--AKHIR DARI UPDATES-->
        </div>
    </div>
    <script src="<?= base_url('assets/js/project.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>

    <footer>
        <p style=" text-align: center;">Made with ❤️ by Is'ad &copy; 2022</p>
    </footer>
</body>

</html>