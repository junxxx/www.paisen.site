<?php
/**
 * Copyright (c) 2012,2345
 * 摘   要：
 * 作   者：panj
 * 修改日期：2019/4/16
 */
if (! function_exists('resAjax')) {
    /**
     * 功  能：response ajax structure
     * 作  者：panj
     *
     * @param int      $status
     * @param string   $msg
     * @param array    $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function resAjax(int $status, string $msg = '', array $data = [])
    {
        return response()->json(['status' => $status, 'msg' => $msg, 'data' => $data]);
    }
}
