@extends('errors::minimal')

@section('title', __('Not Found'))
@section('status_code', '401')
@section('status_text', '對不起，您需要登陸才能訪問該頁面')

@section('btn_link', route('home.index'))
@section('btn_text', 'Back Home')


@section('svg_url', asset('svg/401.svg'))
