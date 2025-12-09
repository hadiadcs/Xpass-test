@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $event->title }} | XPass</title>
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
        .back-btn { background: #fff; padding: 8px 14px; border-radius: 999px; border: 1px solid #e6e9ef; color: var(--muted); font-size: 14px; transition: all 0.2s; }
        .back-btn:hover { border-color: var(--accent); color: var(--accent); }

        /* Main */
        main h1 { margin: 0 0 12px 0; font-size: 32px; color: #0f172a; }
        .meta-row { display: flex; gap: 24px; flex-wrap: wrap; margin-bottom: 20px; font-size: 14px; color: var(--muted); }
        .meta-item { display: flex; align-items: center; gap: 6px; }

        /* Card */
        .card { background: var(--card); border-radius: var(--radius); padding: 20px; box-shadow: 0 4px 12px rgba(16,24,40,.05); margin-bottom: 20px; }
        .section-title { font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 12px 0; }
        .info-grid { display: grid; gap: 16px; }
        .info-item { padding-bottom: 12px; border-bottom: 1px solid #e6e9ef; }
        .info-item:last-child { border-bottom: none; padding-bottom: 0; }
        .info-label { font-size: 13px; color: var(--muted); margin-bottom: 4px; }
        .info-value { font-size: 15px; color: #111; }
        .description { font-size: 15px; line-height: 1.6; color: #374151; }

        /* Bookings */
        .bookings-list { list-style: none; padding: 0; margin: 0; }
        .booking-item { padding: 12px; background: var(--bg); border-radius: 8px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center; font-size: 14px; }
        .booking-item:last-child { margin-bottom: 0; }
        .user-name { font-weight: 600; color: #0f172a; }
        .booking-date { color: var(--muted); font-size: 13px; }
        .empty-bookings { padding: 20px; text-align: center; color: var(--muted); font-size: 14px; }

        /* Footer */
        footer.site { margin-top: 40px; padding: 16px; text-align: center; color: var(--muted); font-size: 13px; }

        @media (max-width: 560px) {
            main h1 { font-size: 24px; }
            .meta-row { gap: 16px; }
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

            <a class="back-btn" href="{{ url('/events') }}">← Back to Events</a>
        </header>

        <main>
            <h1>{{ $event->title }}</h1>

            <div class="meta-row">
                <div class="meta-item">
                    <span>📅</span>
                    <span>{{ date('M j, Y', strtotime($event->start_date)) }}</span>
                </div>
                <div class="meta-item">
                    <span>📍</span>
                    <span>{{ $event->location ?? 'TBD' }}</span>
                </div>
                <div class="meta-item">
                    <span>💰</span>
                    <span>${{ number_format($event->price, 2) }}</span>
                </div>
                @if($event->category)
                <div class="meta-item">
                    <span>🏷️</span>
                    <span>{{ $event->category }}</span>
                </div>
                @endif
            </div>

            <div class="card">
                <h2 class="section-title">Event Details</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Description</div>
                        <div class="info-value description">{{ $event->description }}</div>
                    </div>
                    @if(isset($event->organizer))
                    <div class="info-item">
                        <div class="info-label">Organizer</div>
                        <div class="info-value">{{ $event->organizer->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <h2 class="section-title">Bookings ({{ $event->bookings->count() }})</h2>
                @if($event->bookings->isEmpty())
                    <div class="empty-bookings">
                        No bookings yet. Be the first to book this event!
                    </div>
                @else
                    <ul class="bookings-list">
                        @foreach($event->bookings as $booking)
                            <li class="booking-item">
                                <span class="user-name">{{ $booking->user->name }}</span>
                                <span class="booking-date">{{ date('M j, Y g:i A', strtotime($booking->created_at)) }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </main>

        <footer class="site">
            © {{ date('Y') }} XPass — Built for clear event discovery. — <a href="#" style="color:var(--accent)">Contact</a>
        </footer>
    </div>
</body>
</html>