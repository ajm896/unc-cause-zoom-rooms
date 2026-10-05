<?php
function to_min(string $hhmm): ?int {          // "13:45" -> 825
    if (!preg_match('/^(\d{1,2}):(\d{2})$/', $hhmm, $m)) return null;
    return (int)$m[1] * 60 + (int)$m[2];
}

function fmt_min(int $min): string {           // 825 -> "1:45pm"
    $h = intdiv($min, 60); $m = $min % 60;
    return sprintf('%d:%02d%s', ($h % 12) ?: 12, $m, $h < 12 ? 'am' : 'pm');
}

function e($s): string { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

// Index of the session on now, and of the next one to start (either may be null)
function live_and_next(array $sessions, int $now): array {
    $live = $next = null;
    foreach ($sessions as $i => $s) {
        if ($s['start'] <= $now && $now < $s['end']) $live = $i;
        if ($next === null && $s['start'] > $now)     $next = $i;
    }
    return [$live, $next];
}
