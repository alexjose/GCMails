<?php

class SendInternalMailsCommand extends CConsoleCommand {

    public function actionIndex($limit = 5) {

        $debug = true;

        $criteria = new CDbCriteria();
        $criteria->compare('status', 0);
        $criteria->limit = $limit;

        $mails = InternalMailQueue::model()->findAll($criteria);
        $sender = Yii::app()->Smtpmail;
        foreach ($mails as $mail) {
            $sender->SetFrom(Yii::app()->params['adminEmail'], Yii::app()->name);
            $sender->Subject = $mail->subject;
            $sender->MsgHTML($mail->body);
            $sender->AddAddress($mail->emailID);
            if (!$sender->Send()) {
                echo "Mailer Error: " . $sender->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        }
    }

}
