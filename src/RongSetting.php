<?php
/**
 * RongSetting.php
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

use Kollway\EasyRongcloud\Exceptions\BaseException;
use Kollway\EasyRongcloud\Exceptions\UserException;

class RongSetting extends Rongcloud
{
    /**
     * TODO
     * 添加敏感词
     * @param $word 敏感词，最长不超过 32 个字符。（必传）
     * @return mixed
     */
    public function wordfilterAdd($word) {
        try{
            if(empty($word))
                throw new BaseException('敏感词不能为空');
            $params['word'] = $word;
            $ret = $this->curl('/wordfilter/add',$params);
            if(empty($ret))
                throw new BaseException('请求失败');
            return $ret;
        }catch (BaseException $e) {
            throw new BaseException($e->getMessage());
        }
    }

    /**
     * TODO
     * 移除敏感词
     * @param $word 敏感词，最长不超过 32 个字符。（必传）
     * @return mixed
     */
    public function wordfilterDelete($word) {
        try{
            if(empty($word))
                throw new BaseException('敏感词不能为空');
            $params['word'] = $word;
            $ret = $this->curl('/wordfilter/delete',$params);
            if(empty($ret))
                throw new BaseException('请求失败');
            return $ret;
        }catch (BaseException $e) {
            throw new BaseException($e->getMessage());
        }
    }
    /**
     * TODO
     * 查询敏感词列表
     * @return mixed
     */
    public function wordfilterList() {
        try{
            $ret = $this->curl('/wordfilter/list',array());
            if(empty($ret))
                throw new BaseException('请求失败');
            return $ret;
        }catch (BaseException $e) {
            throw new BaseException($e->getMessage());
        }
    }
}