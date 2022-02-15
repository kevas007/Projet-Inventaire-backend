<?php

use PHPUnit\Framework\TestCase;
use SimpleSoftwareIO\QrCode\Image;
use SimpleSoftwareIO\QrCode\ImageMerge;

class ImageMergeTest extends TestCase
{
    /**
     * The location to save the testing image.
     *
     * @var string
     */
    protected $testImageSaveLocation;

    /**
     * The location to save the compare image.
     *
     * @var string
     */
    protected $compareTestSaveLocation;

    /**
     * The ImageMerge Object.
     *
     * @var ImageMerge
     */
    protected $testImage;

    /**
<<<<<<< HEAD
     * The location of the test image that is having an image merged over top of it.
=======
     * The location of the test image to use.
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
     *
     * @var string
     */
    protected $testImagePath;

<<<<<<< HEAD
    /**
     * The location of the test image that is being merged.
     * @var mixed
     */
    protected $mergeImagePath;

    public function setUp(): void
    {
        $this->testImagePath = file_get_contents(dirname(__FILE__).'/Images/simplesoftware-icon-grey-blue.png');
        $this->mergeImagePath = file_get_contents(dirname(__FILE__).'/Images/200x300.png');
        $this->testImage = new ImageMerge(
            new Image($this->testImagePath),
            new Image($this->mergeImagePath)
=======
    public function setUp(): void
    {
        $this->testImagePath = file_get_contents(dirname(__FILE__).'/Images/simplesoftware-icon-grey-blue.png');
        $this->testImage = new ImageMerge(
            new Image($this->testImagePath),
            new Image($this->testImagePath)
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
        );

        $this->testImageSaveLocation = dirname(__FILE__).'/testImage.png';
        $this->compareTestSaveLocation = dirname(__FILE__).'/compareImage.png';
    }

    public function tearDown(): void
    {
        @unlink($this->testImageSaveLocation);
        @unlink($this->compareTestSaveLocation);
    }

    public function test_it_merges_two_images_together_and_centers_it()
    {
<<<<<<< HEAD
        //We know the source image is 512x512 and the merge image is 200x300
        $source = imagecreatefromstring($this->testImagePath);
        $merge = imagecreatefromstring($this->mergeImagePath);
=======
        //We know the test image is 512x512
        $source = imagecreatefromstring($this->testImagePath);
        $merge = imagecreatefromstring($this->testImagePath);
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b

        //Create a PNG and place the image in the middle using 20% of the area.
        imagecopyresampled(
            $source,
            $merge,
<<<<<<< HEAD
            205,
            222,
            0,
            0,
            102,
            67,
            536,
            354
=======
            204,
            204,
            0,
            0,
            102,
            102,
            512,
            512
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
        );
        imagepng($source, $this->compareTestSaveLocation);

        $testImage = $this->testImage->merge(.2);
        file_put_contents($this->testImageSaveLocation, $testImage);

        $this->assertEquals(file_get_contents($this->compareTestSaveLocation), file_get_contents($this->testImageSaveLocation));
    }

    public function test_it_throws_an_exception_when_percentage_is_greater_than_1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->testImage->merge(1.1);
    }
}
