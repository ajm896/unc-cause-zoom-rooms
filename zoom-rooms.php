<?php
require __dir__ . "/config.php";
require __dir__ . "/helpers.php";


$now_min = to_min($_GET['t'] ?? '') ?? (int)date('G') * 60 + (int)date('i');

// --- Load today's sessions, grouped by room ---
$rooms  = array_fill_keys(range('a', 'f'), []);  // room_id => [sessions]
$lines  = file($csv_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$header = str_getcsv(array_shift($lines), escape: '');
foreach ($lines as $line) {
    $s = array_combine($header, str_getcsv($line, escape: ''));
    if ((int)$s['day'] !== $current_day) continue;
    $s['start'] = to_min($s['start_time']);
    $s['end']   = to_min($s['end_time']) ?? $s['start'] + $default_minutes;
    $rooms[$s['room_id']][] = $s;
}
foreach ($rooms as $id => $sessions) {
    usort($sessions, fn($a, $b) => $a['start'] <=> $b['start']);
    $rooms[$id] = $sessions;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300"><!-- re-check "now" every 5 min -->
    <title><?= e($event_name) ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/htmlx.min.js"></script>
  </head>                if ($i === $live)               $cls[] = 'current';
                elseif ($s['end'] <= $now_min)   $cls[] = 'past';
                ?>
            <li class="<?= e(implode(' ', $cls)) ?>">
              <time><?= e(fmt_min($s['start'])) ?></time>
              <span><?= e($s['talk_title']) ?></span>
            </li>
              <?php endforeach; ?>
          </ul>
            <?php endif; ?>
 
          <div class="spacer"></div>
          <a class="btn<?= $zoom ? '' : ' disabled' ?>"
            href="<?= $zoom ? e($zoom) : '#' ?>"
            target="_blank" rel="noopener">
            Join <?= e($name) ?>
          </a>
        </article>
          <?php endforeach; ?>
      </section>
    </main>
 
    <footer>
      <!-- TODO: help/contact info, full schedule link, etc. -->
      Having trouble joining? Contact the event team.
    </footer>
 
  </body>
</html>
 
