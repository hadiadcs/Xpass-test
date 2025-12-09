@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>XPass — Upcoming Events</title>
    <style>
        :root {
            --accent: #0d6efd;
            --muted: #6b7280;
            --card: #ffffff;
            --bg: #f5f7fb;
            --radius: 12px;
            --font: 'Inter', ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        * { box-sizing: border-box; }
        body { margin: 0; font-family: var(--font); background: var(--bg); color: #111; }
        a { text-decoration: none; }

        .container { max-width: 900px; margin: 36px auto; padding: 24px; }

        /* Header */
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; }
        .brand { display: flex; align-items: center; gap: 12px; }
        .logo { width: 50px; height: 50px; border-radius: var(--radius); background: linear-gradient(135deg, var(--accent), #6f42c1); color: #fff; font-weight: 700; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .controls { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 12px; }
        .search { display: flex; align-items: center; background: #fff; padding: 8px 12px; border-radius: 999px; box-shadow: 0 1px 2px rgba(16,24,40,.04); }
        .search input { border: 0; outline: 0; padding: 6px 8px; width: 200px; }
        .filter { background: #fff; padding: 8px 14px; border-radius: 999px; border: 1px solid #e6e9ef; color: var(--muted); font-size: 14px; transition: all 0.2s; }
        .filter:hover { border-color: var(--accent); color: var(--accent); }

        /* Main */
        main h1 { margin-bottom: 20px; font-size: 28px; color: #0f172a; }
        .grid { display: grid; grid-template-columns: 1fr; gap: 16px; }

        /* Card */
        .card { background: var(--card); border-radius: var(--radius); padding: 16px; box-shadow: 0 4px 12px rgba(16,24,40,.05); transition: transform 0.2s; }
        .card:hover { transform: translateY(-3px); }
        .meta { display: flex; justify-content: space-between; font-size: 13px; color: var(--muted); margin-bottom: 8px; }
        .title { font-size: 20px; margin: 0 0 8px 0; color: #0f172a; }
        .desc { font-size: 14px; color: #374151; margin-bottom: 12px; }
        .footer-card { display: flex; justify-content: space-between; align-items: center; margin-top: auto; }
        .btn { background: var(--accent); color: #fff; padding: 10px 16px; border-radius: 8px; font-weight: 600; transition: all 0.2s; }
        .btn:hover { background: #0b5ed7; }
        .price { font-weight: 700; color: #111; }
        .category { font-size: 12px; color: var(--muted); }

        /* Empty State */
        .empty { padding: 40px; text-align: center; color: var(--muted); background: #fff; border-radius: var(--radius); }

        /* Footer */
        footer.site { margin-top: 40px; padding: 16px; text-align: center; color: var(--muted); font-size: 13px; }

        @media (max-width: 560px) {
            .search input { width: 140px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="brand">
                <div class="logo">XP</div>
                <div>
                    <div style="font-weight:700">XPass</div>
                    <div style="font-size:12px;color:var(--muted)">Events & Bookings</div>
                </div>
            </div>

            <div class="controls" role="navigation" aria-label="Actions">
                <form class="search" method="GET" action="{{ url()->current() }}">
                    <input name="q" placeholder="Search events, location or category" value="{{ request('q') }}" aria-label="Search events" />
                </form>

                <a class="filter" href="?sort=upcoming">Upcoming</a>
                <a class="filter" href="?sort=popular">Popular</a>
            </div>
        </header>

        <main>
            <h1>Upcoming Events</h1>

            @if ($events->isEmpty())
                <div class="empty" role="status">
                    <strong>No events found.</strong>
                    <div style="margin-top:8px">Try a different filter or check back later.</div>
                </div>
            @else
                <div class="grid" role="list">
                    @foreach ($events as $event)
                        <article class="card" role="listitem">
                            <div class="meta">
                                <div>{{ date('M j, Y', strtotime($event->start_date)) }}</div>
                                <div>{{ $event->location ?? 'TBD' }}</div>
                            </div>

                            <h2 class="title">{{ $event->title }}</h2>
                            <p class="desc">{{ Str::limit($event->description, 140) }}</p>

                            <div class="footer-card">
                                <a class="btn" href="/events/{{ $event->id }}">View details</a>
                                <div style="text-align:right">
                                    <div class="price">${{ number_format($event->price, 2) }}</div>
                                    <div class="category">{{ $event->category ?? 'General' }}</div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </main>

        <footer class="site">
            © {{ date('Y') }} XPass — Built for clear event discovery. — <a href="#" style="color:var(--accent)">Contact</a>
        </footer>
    </div>
</body>
</html>
