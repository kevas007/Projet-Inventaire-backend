<?php

namespace SimpleSoftwareIO\QrCode;

<<<<<<< HEAD
use InvalidArgumentException;

=======
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
class ImageMerge
{
    /**
     * Holds the QrCode image.
     *
     * @var Image
     */
    protected $sourceImage;

    /**
     * Holds the merging image.
     *
     * @var Image
     */
    protected $mergeImage;

    /**
     * The height of the source image.
     *
     * @var int
     */
    protected $sourceImageHeight;

    /**
     * The width of the source image.
     *
     * @var int
     */
    protected $sourceImageWidth;

    /**
     * The height of the merge image.
     *
     * @var int
     */
    protected $mergeImageHeight;

    /**
     * The width of the merge image.
     *
     * @var int
     */
    protected $mergeImageWidth;

    /**
<<<<<<< HEAD
     * Holds the radio of the merging image.
     *
     * @var float
     */
    protected $mergeRatio;

    /**
=======
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
     * The height of the merge image after it is merged.
     *
     * @var int
     */
    protected $postMergeImageHeight;

    /**
     * The width of the merge image after it is merged.
     *
     * @var int
     */
    protected $postMergeImageWidth;

    /**
     * The position that the merge image is placed on top of the source image.
     *
     * @var int
     */
    protected $centerY;

    /**
     * The position that the merge image is placed on top of the source image.
     *
     * @var int
     */
    protected $centerX;

    /**
     * Creates a new ImageMerge object.
     *
     * @param $sourceImage Image The image that will be merged over.
     * @param $mergeImage Image The image that will be used to merge with $sourceImage
     */
    public function __construct(Image $sourceImage, Image $mergeImage)
    {
        $this->sourceImage = $sourceImage;
        $this->mergeImage = $mergeImage;
    }

    /**
     * Returns an QrCode that has been merge with another image.
     * This is usually used with logos to imprint a logo into a QrCode.
     *
     * @param $percentage float The percentage of size relative to the entire QR of the merged image
     *
     * @return string
     */
    public function merge($percentage)
    {
        $this->setProperties($percentage);

<<<<<<< HEAD
        $img = imagecreatetruecolor($this->sourceImage->getWidth(), $this->sourceImage->getHeight());
        imagealphablending($img, true);
        $transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
        imagefill($img, 0, 0, $transparent);

        imagecopy(
            $img,
            $this->sourceImage->getImageResource(),
            0,
            0,
            0,
            0,
            $this->sourceImage->getWidth(),
            $this->sourceImage->getHeight()
        );

        imagecopyresampled(
            $img,
=======
        imagecopyresampled(
            $this->sourceImage->getImageResource(),
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
            $this->mergeImage->getImageResource(),
            $this->centerX,
            $this->centerY,
            0,
            0,
            $this->postMergeImageWidth,
            $this->postMergeImageHeight,
            $this->mergeImageWidth,
            $this->mergeImageHeight
        );

<<<<<<< HEAD
        $this->sourceImage->setImageResource($img);

=======
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
        return $this->createImage();
    }

    /**
     * Creates a PNG Image.
     *
     * @return string
     */
    protected function createImage()
    {
        ob_start();
        imagepng($this->sourceImage->getImageResource());

        return ob_get_clean();
    }

    /**
     * Sets the objects properties.
     *
     * @param $percentage float The percentage that the merge image should take up.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
     */
    protected function setProperties($percentage)
    {
        if ($percentage > 1) {
<<<<<<< HEAD
            throw new InvalidArgumentException('$percentage must be less than 1');
=======
            throw new \InvalidArgumentException('$percentage must be less than 1');
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
        }

        $this->sourceImageHeight = $this->sourceImage->getHeight();
        $this->sourceImageWidth = $this->sourceImage->getWidth();

        $this->mergeImageHeight = $this->mergeImage->getHeight();
        $this->mergeImageWidth = $this->mergeImage->getWidth();

        $this->calculateOverlap($percentage);
        $this->calculateCenter();
    }

    /**
     * Calculates the center of the source Image using the Merge image.
<<<<<<< HEAD
     *
     * @return void
     */
    protected function calculateCenter()
    {
        $this->centerX = intval(($this->sourceImageWidth / 2) - ($this->postMergeImageWidth / 2));
        $this->centerY = intval(($this->sourceImageHeight / 2) - ($this->postMergeImageHeight / 2));
=======
     */
    private function calculateCenter()
    {
        $this->centerY = ($this->sourceImageHeight / 2) - ($this->postMergeImageHeight / 2);
        $this->centerX = ($this->sourceImageWidth / 2) - ($this->postMergeImageHeight / 2);
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
    }

    /**
     * Calculates the width of the merge image being placed on the source image.
     *
     * @param float $percentage
<<<<<<< HEAD
     *
     * @return void
     */
    protected function calculateOverlap($percentage)
    {
        $this->mergeRatio = round($this->mergeImageWidth / $this->mergeImageHeight, 2);
        $this->postMergeImageWidth = intval($this->sourceImageWidth * $percentage);
        $this->postMergeImageHeight = intval($this->postMergeImageWidth / $this->mergeRatio);
=======
     */
    private function calculateOverlap($percentage)
    {
        $this->postMergeImageHeight = $this->sourceImageHeight * $percentage;
        $this->postMergeImageWidth = $this->sourceImageWidth * $percentage;
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
    }
}
