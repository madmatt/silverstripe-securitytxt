<?php

class SecurityTxtController extends Controller
{
	private static $contact;

	private static $encryption;

	private static $acknowledgements;

	private static $policy;

	private static $hiring;

    /**
     * @throws SS_HTTPResponse_Exception If an invalid URL is passed in
     */
	public function index()
    {
        // Provide either security.txt or public key info
        switch ($this->getRequest()->getURL(false)) {
            case '.well-known/security.txt':
                return $this->provideSecurityText();
                break;

            case '.well-known/security-key.txt':
                return $this->provideKeyText();
                break;

            default:
                $this->httpError(404);

        }
    }

    private function provideSecurityText()
    {
        // If Contact is not specified, the file is invalid so return a 404
        if (!$this->config()->contact) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $this->getResponse()->addHeader('Content-type', 'text/plain');
        $body =
    }

    private function provideKeyText()
    {
        // If Encryption is not specified, then there is no public key to provide
        if (!$this->config()->encryption) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
    }
}