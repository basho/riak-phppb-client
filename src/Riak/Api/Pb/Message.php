<?php
/**
 * Created by PhpStorm.
 * User: chrismancini
 * Date: 10/2/15
 * Time: 2:51 PM
 */

namespace Basho\Riak\Api\Pb;


class Message
{
    const RpbErrorResp = 0;
    const RpbPingReq = 1;
    const RpbPingResp = 2;
    const RpbGetClientIdReq = 3;
    const RpbGetClientIdResp = 4;
    const RpbSetClientIdReq = 5;
    const RpbSetClientIdResp = 6;
    const RpbGetServerInfoReq = 7;
    const RpbGetServerInfoResp = 8;
    const RpbGetReq = 9;
    const RpbGetResp = 10;
    const RpbPutReq = 11;
    const RpbPutResp = 12;
    const RpbDelReq = 13;
    const RpbDelResp = 14;
    const RpbListBucketsReq = 15;
    const RpbListBucketsResp = 16;
    const RpbListKeysReq = 17;
    const RpbListKeysResp = 18;
    const RpbGetBucketReq = 19;
    const RpbGetBucketResp = 20;
    const RpbSetBucketReq = 21;
    const RpbSetBucketResp = 22;
    const RpbMapRedReq = 23;
    const RpbMapRedResp = 24;
    const RpbIndexReq = 25;
    const RpbIndexResp = 26;
    const RpbSearchQueryReq = 27;
    const RpbSearchQueryResp = 28;
    const RpbResetBucketReq = 29;
    const RpbResetBucketResp = 30;
    const RpbGetBucketTypeReq = 31;
    const RpbSetBucketTypeReq = 32;
    const RpbGetBucketKeyPreflistReq = 33;
    const RpbGetBucketKeyPreflistResp = 34;
    const RpbCSBucketReq = 40;
    const RpbCSBucketResp = 41;
    const RpbCounterUpdateReq = 50;
    const RpbCounterUpdateResp = 51;
    const RpbCounterGetReq = 52;
    const RpbCounterGetResp = 53;
    const RpbYokozunaIndexGetReq = 54;
    const RpbYokozunaIndexGetResp = 55;
    const RpbYokozunaIndexPutReq = 56;
    const RpbYokozunaIndexDeleteReq = 57;
    const RpbYokozunaSchemaGetReq = 58;
    const RpbYokozunaSchemaGetResp = 59;
    const RpbYokozunaSchemaPutReq = 60;
    const DtFetchReq = 80;
    const DtFetchResp = 81;
    const DtUpdateReq = 82;
    const DtUpdateResp = 83;
    const RpbAuthReq = 253;
    const RpbAuthResp = 254;
    const RpbStartTls = 255;
}
