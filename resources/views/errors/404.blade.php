@extends('errors::minimal')

@section('title', __('Not Found'))
@section('status_code', '404')
@section('status_text', '對不起，未找到該頁面。')


@section('btn_link', route('home.index'))
@section('btn_text', 'Back Home')


@section('svg_url', asset('svg/404.svg'))
