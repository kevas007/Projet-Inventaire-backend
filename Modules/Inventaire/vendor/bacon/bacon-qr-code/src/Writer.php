<?php
declare(strict_types = 1);

namespace BaconQrCode;

use BaconQrCode\Common\ErrorCorrectionLevel;
<<<<<<< HEAD
use BaconQrCode\Common\Version;
=======
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
use BaconQrCode\Encoder\Encoder;
use BaconQrCode\Exception\InvalidArgumentException;
use BaconQrCode\Renderer\RendererInterface;

/**
 * QR code writer.
 */
final class Writer
{
    /**
     * Renderer instance.
     *
     * @var RendererInterface
     */
    private $renderer;

    /**
     * Creates a new writer with a specific renderer.
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Writes QR code and returns it as string.
     *
     * Content is a string which *should* be encoded in UTF-8, in case there are
     * non ASCII-characters present.
     *
     * @throws InvalidArgumentException if the content is empty
     */
    public function writeString(
        string $content,
        string $encoding = Encoder::DEFAULT_BYTE_MODE_ECODING,
<<<<<<< HEAD
        ?ErrorCorrectionLevel $ecLevel = null,
        ?Version $forcedVersion = null
=======
        ?ErrorCorrectionLevel $ecLevel = null
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
    ) : string {
        if (strlen($content) === 0) {
            throw new InvalidArgumentException('Found empty contents');
        }

        if (null === $ecLevel) {
            $ecLevel = ErrorCorrectionLevel::L();
        }

<<<<<<< HEAD
        return $this->renderer->render(Encoder::encode($content, $ecLevel, $encoding, $forcedVersion));
=======
        return $this->renderer->render(Encoder::encode($content, $ecLevel, $encoding));
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
    }

    /**
     * Writes QR code to a file.
     *
     * @see Writer::writeString()
     */
    public function writeFile(
        string $content,
        string $filename,
        string $encoding = Encoder::DEFAULT_BYTE_MODE_ECODING,
<<<<<<< HEAD
        ?ErrorCorrectionLevel $ecLevel = null,
        ?Version $forcedVersion = null
    ) : void {
        file_put_contents($filename, $this->writeString($content, $encoding, $ecLevel, $forcedVersion));
=======
        ?ErrorCorrectionLevel $ecLevel = null
    ) : void {
        file_put_contents($filename, $this->writeString($content, $encoding, $ecLevel));
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
    }
}
