<?php
/**
 * Default config header created during install
 */

return new oat\oatbox\filesystem\FileSystemService(array(
    'filesPath' => 'C:\\xampp\\htdocs\\taopam\\data\\',
    'adapters' => array(
        'taskQueueStorage' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\taskQueueStorage'
            )
        ),
        'fileUploadDirectory' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\tao/upload'
            )
        ),
        'public' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\tao/public'
            )
        ),
        'private' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\tao/private'
            )
        ),
        'log' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\tao\\log'
            )
        ),
        'sharedTmp' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\tmp'
            )
        ),
        'stateBackup' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\stateBackup'
            )
        ),
        'itemDirectory' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\taoItems/itemData'
            )
        ),
        'taoQtiItem' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\taoQtiItem'
            )
        ),
        'taoQtiTest' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\taoQtiTest'
            )
        ),
        'taoQtiTestSessionFilesystem' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\taoQtiTestSessionFilesystem'
            )
        ),
        'qtiItemPci' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\qtiItemPci'
            )
        ),
        'qtiItemImsPci' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\qtiItemImsPci'
            )
        ),
        'portableElementStorage' => array(
            'class' => 'Local',
            'options' => array(
                'root' => 'C:\\xampp\\htdocs\\taopam\\data\\portableElement'
            )
        )
    )
));
