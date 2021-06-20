@extends('errors::minimal')

@section('title', __('403 Forbidden'))
@section('status_code', '403')
@section('status_text', '對不起，資源不可用。')


@section('btn_link', route('home.index'))
@section('btn_text', 'Back Home')


@section('svg_url', asset('svg/403.svg'))
