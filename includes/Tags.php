<?php
namespace MCBBSWiki;

use Parser;
use PPFrame;
use Html;

class Tags {
    public static function renderTagMCBBSAvatar($input,array $args,Parser $parser,PPFrame $frame){
        $uid=isset($args['uid'])?htmlspecialchars( $args['uid'] ):'1';
        $image = Html::element('img',['src'=>'https://www.mcbbs.net/uc_server/avatar.php?uid='.$uid.'&size=big','class'=>'mcbbs-avatar mcbbs-avatar-'.$uid],'');
        return $image;
    }
    public static function renderTagBilibili($input,array $args,Parser $parser,PPFrame $frame) {
        $attr = [
            'allowfullscreen'=>'allowfullscreen',
            'frameborder'=>'0',
            'sandbox'=>'allow-top-navigation allow-same-origin allow-forms allow-scripts',
            'scrolling'=>'no',
            'width'=>isset($args['width'])?$args['width']:'600',
            'height'=>isset($args['height'])?$args['height']:'600'
        ];
        if(isset($args['bv'])){
            $src='https://player.bilibili.com/player.html?bvid='.htmlspecialchars($args['bv']).'&high_quality=1';
            $attr['src']=$src;
            return Html::element('iframe',$attr,'');
        } else {
            return Html::element('p',['style'=>'color:red;font-size:160%'],wfMessage('bilibili-nobvid')->text());
        }
    }
}
