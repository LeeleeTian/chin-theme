<?php

/**
 * Newsletter (Mailchimp)
 */
class Newsletter
{
    protected $client;

    public function __construct($logger)
    {
        $this->logger = $logger;

        $this->client = new Mailchimp(getenv('MAILCHIMP_KEY'));
    }

    public function subscribeNewsletter($email, $firstname, $lastname)
    {
        $mergeVars = [
            'FNAME' => $firstname,
            'LNAME' => $lastname,
            'MMERGE9' => '-',
        ];

        return $this->requestSubscribe($email, $mergeVars, getenv('MAILCHIMP_LIST_NEWSLETTER'));
    }

    protected function requestSubscribe($email, $mergeVars, $listId)
    {
        try {
            $this->logger->debug("New subscription for email $email", $mergeVars);

            $result = $this->client->lists->subscribe(
                $listId,
                ['email' => $email],
                $mergeVars,
                'html',     // email_type
                true,      // double_optin - sets whether email confirmation is required
                true,       // update_existing
                true        // replace_interests
            );
        } catch(Exception $e) {
            echo $e->getMessage();
            echo get_class($e);
            error_log('A mailchimp error occured: ' . get_class($e) . ' - ' . $e->getMessage());
            $this->logger->debug('A mailchimp error occured: ' . get_class($e) . ' - ' . $e->getMessage());
            return false;
        }

        return true;
    }
}