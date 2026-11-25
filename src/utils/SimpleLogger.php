<?php
class SimpleLogger
{
    private $file;

    private static ?SimpleLogger $instance = null;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self("./log/app.log");
        }
        return self::$instance;
    }

    private function __construct(string $filePath)
    {
        $this->file = $filePath;
        // Asegurar que el directorio exista
        if (!is_dir(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }
    }

    public function log(string $level, string $message, array $context = []): void
    {
        $date = date('Y-m-d H:i:s');
        // Formatear el contexto como JSON si existe
        $contextStr = !empty($context) ? ' ' . json_encode($context, JSON_UNESCAPED_UNICODE) : '';

        // Formato: [2026-11-07 12:00:00] [INFO] Mensaje {"clave":"valor"}
        $line = sprintf("[%s] [%s] %s%s\n", $date, strtoupper($level), $message, $contextStr);

        // Escribir en el archivo (con bloqueo para evitar conflictos)
        file_put_contents($this->file, $line, FILE_APPEND | LOCK_EX);
    }

    public function info(string $message, array $context = []): void
    {
        $this->log('INFO', $message, $context);
    }

    public function error(string $message, array $context = []): void
    {
        $this->log('ERROR', $message, $context);
    }
}
