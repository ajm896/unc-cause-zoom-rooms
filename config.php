<?php
/* ------------------------------------------------------------------
 * Digital Conference Center — landing page
 *
 * Reads the schedule from rooms.csv (same directory). CSV header:
 *   day,room_id,start_time,end_time,type,talk_title,speaker,zoom_url
 *   - room_id: a–f (lowercase)    - times: 24h "HH:MM", end_time required
 *   - type: session | sponsor | sig  (drives the colour tag)
 * The CSV is trusted: validate it before deploying rather than here.
 *
 * Shows, per salon, the session live right now or the next one up.
 * Testing: ?day=N picks the day, ?t=HH:MM overrides the time.
 * ------------------------------------------------------------------ */

// --- Config ---
$event_name      = 'UNCCAUSE CC Center';
$csv_file        = __DIR__ . '/rooms.csv';
$current_day     = (int)($_GET['day'] ?? 2);   // TODO: derive from date, e.g. ['2026-10-14' => 1, ...]
$default_minutes = 60;                         // safety net if a row has no end_time

date_default_timezone_set('America/New_York');
