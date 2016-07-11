<?php
/**
 * RongChatroom.php
 *
 * Part of Kollway\EasyRongcloud.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    refear99 <refear99@gmail.com>
 * @copyright 2015 refear99 <refear99@gmail.com>
 * @link      https://github.com/refear99
 */

namespace Kollway\EasyRongcloud;

use Kollway\EasyRongcloud\Exceptions\UserException;

class RongChatroom extends Rongcloud
{
    /**
     * TODO
     * 创建聊天室
     * @param array $data   key:要创建的聊天室的id；val:要创建的聊天室的name。（必传）
     * @return json|xml
     */
    public function chatroomCreate($data = array()) {
        try{
            if(empty($data))
                throw new Exception('要加入群的用户 Id 不能为空');
            $params = array();
            foreach($data as $key=>$val) {
                $k = 'chatroom['.$key.']';
                $params["$k"] = $val;
            }
            $ret = $this->curl('/chatroom/create', $params);
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * TODO
     * 销毁聊天室
     * @param $chatroomId   要销毁的聊天室 Id。（必传）
     * @return json|xml
     */
    public function chatroomDestroy($chatroomId) {
        try{
            if(empty($chatroomId))
                throw new Exception('要销毁的聊天室 Id 不能为空');
            $ret = $this->curl('/chatroom/destroy', array('chatroomId' => $chatroomId));
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * TODO
     * 查询聊天室信息 方法
     * @param $chatroomId   要查询的聊天室id（必传）
     * @return json|xml
     */
    public function chatroomQuery($chatroomId) {
        try{
            if(empty($chatroomId))
                throw new Exception('要查询的聊天室 Id 不能为空');
            $ret = $this->curl('/chatroom/query', array('chatroomId' => $chatroomId));
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * TODO
     * 查询聊天室内用户
     * @param $chatroomId 聊天室 Id
     */
    public function userChatroomQuery($chatroomId) {
        try{
            if(empty($chatroomId)) {
                throw new Exception('聊天室 Id 不能为空');
            }
            $ret = $this->curl('/chatroom/user/query', array('chatroomId' => $chatroomId));
            if(empty($ret)) {
                throw new Exception('请求失败');
            }
            return $ret;
        } catch(Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * 添加禁言聊天室成员 方法
     * @param $userId 用户 Id。（必传）
     * @param $chatroomId 聊天室 Id。（必传）
     * @param $minute 禁言时长，以分钟为单位，最大值为43200分钟。（必传）
     * @return mixed
     */
    public function chatroomUserGagAdd($userId,$chatroomId,$minute) {
        try{
            if(empty($userId))
                throw new Exception('用户 Id 不能为空');
            if(empty($chatroomId))
                throw new Exception('聊天室 Id 不能为空');
            if(empty($minute) || intval($minute)>43200)
                throw new Exception('禁言时长不能为空,且最大值为43200');
            $params['userId'] = $userId;
            $params['chatroomId'] = $chatroomId;
            $params['minute'] = $minute;
            $ret = $this->curl('/chatroom/user/gag/add',$params);
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * 移除禁言聊天室成员 方法
     * @param $userId 用户 Id。（必传）
     * @param $chatroomId 聊天室 Id。（必传）
     * @return mixed
     */
    public function chatroomUserGagRollback($userId,$chatroomId) {
        try{
            if(empty($userId))
                throw new Exception('用户 Id 不能为空');
            if(empty($chatroomId))
                throw new Exception('聊天室 Id 不能为空');
            $params['userId'] = $userId;
            $params['chatroomId'] = $chatroomId;
            $ret = $this->curl('/chatroom/user/gag/rollback',$params);
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * 查询被禁言聊天室成员 方法
     * @param $chatroomId 聊天室 Id。（必传）
     * @return mixed
     */
    public function chatroomUserGagList($chatroomId) {
        try{
            if(empty($chatroomId))
                throw new Exception('聊天室 Id 不能为空');
            $params['chatroomId'] = $chatroomId;
            $ret = $this->curl('/chatroom/user/gag/list',$params);
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
    /**
     * 添加聊天室成员 方法
     * @param $userId 用户 Id。（必传）
     * @param $chatroomId 聊天室 Id。（必传）
     * @return mixed
     */
    public function chatRoomUserAdd($userId,$chatroomId){
        try{
            if(empty($userId))
                throw new Exception('用户 Id 不能为空');
            if(empty($chatroomId))
                throw new Exception('聊天室 Id 不能为空');
            $params['userId'] = $userId;
            $params['chatroomId'] = $chatroomId;
            $ret = $this->curl('/chatroom/join',$params);
            if(empty($ret))
                throw new Exception('请求失败');
            return $ret;
        }catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}