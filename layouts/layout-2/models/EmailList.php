<?php
namespace models;

use db\DB;
use PDO;
use helpers\Text;

class EmailList
{
    public $id;
    public $email;
    public $created_at;
    public $updated_at;
    public $active;

    /**
     * Subscribe email
     * @param $email
     * @return void
     */
    public function subscribeEmail($email)
    {
        // Check if email already exist
        $q = DB::$db->prepare('SELECT * FROM email_list WHERE email = :email');
        $q->execute(['email' => $email]);
        $email_row = $q->fetch(PDO::FETCH_UNIQUE);

        if (!$email_row) {
            // Subscribe email
            $q = DB::$db->prepare('INSERT INTO email_list (email, created_at, updated_at, unsubscribe_token) VALUES (:email, :created_at, :updated_at, :unsubscribe_token)');
            $q->execute(['email' => $email, 'created_at' => time(), 'updated_at' => time(), 'unsubscribe_token' => Text::generateRandomString()]);
        } else if (!$email_row['active']) {
            // Renew unsubscribed email
            $q = DB::$db->prepare('UPDATE email_list SET updated_at = :updated_at, active = 1 WHERE id = :id');
            $q->execute(['updated_at' => time(), 'id' => $email_row['id']]);
        }
    }

    /**
     * Unsubscribe email
     * @param $email
     * @param $unsubscribe_token
     * @return void
     */
    public function unsubscribeEmail($email, $unsubscribe_token)
    {
        // Get email row
        $q = DB::$db->prepare('SELECT * FROM email_list WHERE email = :email');
        $q->execute(['email' => $email]);
        $email_row = $q->fetch(PDO::FETCH_UNIQUE);

        if ($email_row && $email_row['unsubscribe_token'] == $unsubscribe_token) {
            // Unsubscribe email
            $q = DB::$db->prepare('UPDATE email_list SET updated_at = :updated_at, active = 0 WHERE id = :id');
            $q->execute(['updated_at' => time(), 'id' => $email_row['id']]);
        }
    }

}