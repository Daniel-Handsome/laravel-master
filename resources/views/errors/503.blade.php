@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('status_code', '500')
@section('status_text', '對不起，服務不可用。')


@section('btn_link', route('home.index'))
@section('btn_text', 'Back Home')


@section('svg_url', asset('svg/503.svg'))
