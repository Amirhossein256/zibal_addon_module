<?php

namespace Amirhossein256\Zibal\Clients;

use App\Http\Clients\AbstractApiClient;
use GuzzleHttp\Exception\GuzzleException;

class ZibalApi extends AbstractApiClient
{

    /**
     * @param $national_code
     * @param $mobile
     * @return array
     * @throws GuzzleException
     */
    public function checkNationalCodeAndMobile($national_code, $mobile)
    {

        return $this->post('shahkarInquiry', [
            'nationalCode' => $national_code,
            'mobile' => $mobile
        ]);
    }

    /**
     * @param $national_code
     * @param $birthdate
     * @return array
     * @throws GuzzleException
     */
    public function checkNationalCodeAndBirthdate($national_code, $birthdate)
    {

        return $this->post('nationalIdentityInquiry', [
            'nationalCode' => $national_code,
            'birthDate' => $birthdate
        ]);
    }

}