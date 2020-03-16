<?php

namespace App\Http\Controllers\Api\Video;

use App\Http\Controllers\Controller;
use App\Services\Converter\Converter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class ConvertController
 * @package App\Http\Controllers\Api\Video
 */
class ConvertController extends Controller
{
    /**
     * @var Converter
     */
    private $converter;

    /**
     * ConvertController constructor.
     * @param Converter $converter
     */
    public function __construct(
        Converter $converter
    ) {
        $this->converter = $converter;
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, $this->getRules());
    }

    /**
     * @return array
     */
    private function getRules()
    {
        return [
            'video' => 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime|max:20000',
        ];
    }
}
