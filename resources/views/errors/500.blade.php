@extends('errors::minimal')

@section('title', __('Server Error'))
@section('status_code', '500')
@section('status_text', '對不起，服務器錯誤。')


@section('btn_link', route('home.index'))
@section('btn_text', 'Back Home')


@section('svg_url', asset('svg/500.svg'))
