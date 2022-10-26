<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers\VideoEditor;

/**
 * UsersControllerClasss.
 *
 * @author Andchir <andycoderw@gmail.com>
 */
class UsersControllerClass extends BaseControllerClass {
    /**
     * UsersControllerClass constructor.
     *
     * @param array $config
     * @param array $lang
     */
    public function __construct($config = [], $lang = []) {
        parent::__construct($config, $lang);
    }

    /**
     * @return array
     */
    public function getUsers() {
        $output = [
            'success' => false,
            'data' => [],
        ];
        $currentUser = $this->getUser(true);
<<<<<<< HEAD
<<<<<<< HEAD
        if (false === $currentUser || 'admin' !== $currentUser['role']) {
=======
        if (false === $currentUser || 'admin' != $currentUser['role']) {
>>>>>>> 51fcb2a (up)
=======
        if (false === $currentUser || 'admin' != $currentUser['role']) {
>>>>>>> 3b1a9f8 (up)
            return $output;
        }

        $userStore = $this->dbGetStore('users');
        $keys = $userStore->getKeys();

        $total = \count($keys);
        $pages = $this->getPagesData($total);

        $index = 0;
        foreach ($keys as $userId) {
            if ($index < $pages['offset']) {
                ++$index;
                continue;
            }
            if ($index + 1 > $pages['offset'] + $pages['perPage']) {
                break;
            }

            $user = $userStore->get($userId);
            $user['id'] = $userId;
            if (! isset($user['confirmed'])) {
                $user['confirmed'] = true;
            }
            if (! isset($user['type'])) {
                $user['type'] = 'basic';
            }
            $output['data'][] = $user;
            ++$index;
        }

        $output['pages'] = $pages;

        return $output;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get pages data
=======
     * Get pages data.
>>>>>>> 51fcb2a (up)
=======
     * Get pages data.
>>>>>>> 3b1a9f8 (up)
     *
     * @return array
     */
    public function getPagesData($totalItems) {
        $pages = [
            'current' => 1,
            'total' => 0,
            'perPage' => 12,
            'offset' => 0,
        ];
        $pages['current'] = ! empty($_GET['page']) && is_numeric($_GET['page'])
            ? $_GET['page']
            : 1;
        $pages['total'] = ceil($totalItems / $pages['perPage']);
        $pages['offset'] = $pages['perPage'] * ($pages['current'] - 1);

        return $pages;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Edit user page
=======
     * Edit user page.
>>>>>>> 51fcb2a (up)
=======
     * Edit user page.
>>>>>>> 3b1a9f8 (up)
     *
     * @return array
     */
    public function editUserPage() {
        $output = [];

<<<<<<< HEAD
<<<<<<< HEAD
        $userId = ! empty($_GET['user_id']) && ! \is_array($_GET['user_id'])
=======
        $userId = ! empty($_GET['user_id']) && ! is_array($_GET['user_id'])
>>>>>>> 51fcb2a (up)
=======
        $userId = ! empty($_GET['user_id']) && ! is_array($_GET['user_id'])
>>>>>>> 3b1a9f8 (up)
            ? trim(urldecode($_GET['user_id']))
            : 0;

        $currentUser = $this->getUser();
<<<<<<< HEAD
<<<<<<< HEAD
        if (false === $currentUser || 'admin' !== $currentUser['role']) {
=======
        if (false === $currentUser || 'admin' != $currentUser['role']) {
>>>>>>> 51fcb2a (up)
=======
        if (false === $currentUser || 'admin' != $currentUser['role']) {
>>>>>>> 3b1a9f8 (up)
            return $output;
        }

        $user = $this->getUser(false, $userId, false);
        if (false === $user) {
            return $output;
        }

        if (! empty($_POST['name'])) {
            $currentConfirmed = ! empty($user['confirmed']);

            $data = [];
            if (! empty($_POST['name'])) {
                $data['name'] = trim($_POST['name']);
            }
            if (! empty($_POST['email'])) {
                $data['email'] = trim($_POST['email']);
            }
            if (! empty($_POST['role'])) {
                $data['role'] = trim($_POST['role']);
            }
<<<<<<< HEAD
            if ($currentUser['id'] !== $user['id']) {
=======
            if ($currentUser['id'] != $user['id']) {
<<<<<<< HEAD
>>>>>>> 51fcb2a (up)
=======
>>>>>>> 3b1a9f8 (up)
                $data['blocked'] = ! empty($_POST['blocked']);
                $data['confirmed'] = ! empty($_POST['confirmed']);
            }
            if (! empty($_POST['type'])) {
                $data['type'] = trim($_POST['type']);
            }
            self::setFlash('messages', $this->lang['data_successfully_saved']);

            $this->updateUser($user['id'], $data);
            $user = $this->getUser(false, $userId, false);

            if (! $currentConfirmed && $user['confirmed'] && ! $user['blocked']) {
                $emailBody = $this->getTemplate('email_confirm');
                $this->sendEmail($user['email'], $this->lang['your_account_activated'], $emailBody);
            }
        }

        $contentController = new ContentControllerClass($this->config);
        $user['input_data'] = $contentController->getMediaList('input', $user['id']);
        $user['output_data'] = $contentController->getMediaList('output', $user['id']);

        $template = $this->getTemplate('user_edit', $user);

        $output['content'] = $template;

        return $output;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Delete user page
=======
     * Delete user page.
>>>>>>> 51fcb2a (up)
=======
     * Delete user page.
>>>>>>> 3b1a9f8 (up)
     *
     * @param int $userId
     *
     * @return array
     */
    public function deleteUserPage($userId = 0) {
        $output = [];
        if (! $userId) {
<<<<<<< HEAD
<<<<<<< HEAD
            $userId = ! empty($_GET['user_id']) && ! \is_array($_GET['user_id'])
=======
            $userId = ! empty($_GET['user_id']) && ! is_array($_GET['user_id'])
>>>>>>> 51fcb2a (up)
=======
            $userId = ! empty($_GET['user_id']) && ! is_array($_GET['user_id'])
>>>>>>> 3b1a9f8 (up)
                ? trim(urldecode($_GET['user_id']))
                : 0;
        }
        $currentUser = $this->getUser();
        if (false === $currentUser
<<<<<<< HEAD
<<<<<<< HEAD
            || ('admin' !== $currentUser['role'] && $currentUser['id'] !== $userId)
=======
            || ('admin' != $currentUser['role'] && $currentUser['id'] != $userId)
>>>>>>> 51fcb2a (up)
=======
            || ('admin' != $currentUser['role'] && $currentUser['id'] != $userId)
>>>>>>> 3b1a9f8 (up)
        ) {
            return $output;
        }

        $submited = false;
        if (! empty($_POST['accept'])) {
            $submited = true;

<<<<<<< HEAD
<<<<<<< HEAD
            if ('admin' === $currentUser['role']) {
=======
            if ('admin' == $currentUser['role']) {
>>>>>>> 51fcb2a (up)
=======
            if ('admin' == $currentUser['role']) {
>>>>>>> 3b1a9f8 (up)
                $this->deleteUser($userId);
            } else {
                $this->updateUser($userId, ['blocked' => true]);
            }
        }
        if (! empty($_POST['cancel'])) {
            $submited = true;
        }
        if ($submited) {
<<<<<<< HEAD
<<<<<<< HEAD
            $redirectUrl = 'admin' === $currentUser['role']
=======
            $redirectUrl = 'admin' == $currentUser['role']
>>>>>>> 51fcb2a (up)
=======
            $redirectUrl = 'admin' == $currentUser['role']
>>>>>>> 3b1a9f8 (up)
                ? $this->config['base_url'].$this->config['home_url'].'?action=users'
                : $this->config['base_url'].$this->config['home_url'];
            self::redirectTo($redirectUrl);
        }

        $output['content'] = '<form action="'.$this->config['base_url'].$this->config['home_url'].'?action=delete_user&user_id='.$userId.'" method="post">';

<<<<<<< HEAD
        if ($currentUser['id'] === $userId) {
=======
        if ($currentUser['id'] == $userId) {
<<<<<<< HEAD
>>>>>>> 51fcb2a (up)
=======
>>>>>>> 3b1a9f8 (up)
            $output['content'] .= '<p>'.$this->lang['you_sure_you_want_delete_your_account'].'</p>';
        } else {
            $output['content'] .= '<p>'.$this->lang['you_sure_you_want_remove_user'].'</p>';
        }

        $output['content'] .= '<div>';
        $output['content'] .= ' <button type="submit" class="btn btn-primary" name="accept" value="1">'.$this->lang['yes'].'</button>';
        $output['content'] .= ' <button type="submit" class="btn btn-secondary" name="cancel" value="1">'.$this->lang['cancel'].'</button>';
        $output['content'] .= '</div>';
        $output['content'] .= '</form>';

        return $output;
    }

    /**
     * @return bool
     */
    public function updateUser($userId, $data) {
        $userStore = $this->dbGetStore('users');
        $user = $userStore->get($userId);
        if (empty($user)) {
            return false;
        }

        $user = array_merge($user, $data);
        $userStore->set($userId, $user);

        return true;
    }

    /**
     * @return bool
     */
    public function deleteUser($userId) {
        $userStore = $this->dbGetStore('users');
        $user = $userStore->get($userId);
        if (empty($user)) {
            return false;
        }

        $storeDirPath = $this->config['root_path'].$this->config['database_dir'];
        $tmpDirPath = $this->getPublicPath('tmp_dir', $userId);
        $inputDirPath = $this->getPublicPath('input_dir', $userId);
        $outputDirPath = $this->getPublicPath('output_dir', $userId);

        $filesStoreDirPath = $storeDirPath.$userId;

        if (is_dir($filesStoreDirPath)) {
            self::deleteDir($filesStoreDirPath);
        }
        if (is_dir($tmpDirPath)) {
            self::deleteDir($tmpDirPath);
        }
        if (is_dir($inputDirPath)) {
            self::deleteDir($inputDirPath);
        }
        if (is_dir($outputDirPath)) {
            self::deleteDir($outputDirPath);
        }

        $userStore->delete($userId);

        return true;
    }
}
