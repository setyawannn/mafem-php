<?php


function custom_exception_handler(Throwable $exception)
{
  log_message('critical', $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine());

  if (config('app.env') === 'local') {
    echo '<div style="background-color: #ffcccc; border: 1px solid #ff0000; padding: 15px; margin: 10px; font-family: sans-serif;">';
    echo '<h2>Fatal Error</h2>';
    echo '<p><strong>Message:</strong> ' . htmlspecialchars($exception->getMessage()) . '</p>';
    echo '<p><strong>File:</strong> ' . htmlspecialchars($exception->getFile()) . ' on line ' . $exception->getLine() . '</p>';
    echo '<h3>Stack Trace:</h3><pre>' . htmlspecialchars($exception->getTraceAsString()) . '</pre>';
    echo '</div>';
  } else {
    abort_500();
  }
  exit();
}


function custom_error_handler($severity, $message, $file, $line)
{
  if (!(error_reporting() & $severity)) {
    return;
  }
  throw new ErrorException($message, 0, $severity, $file, $line);
}
