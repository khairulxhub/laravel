@extends('admin.layouts.single-master')

@section('title', 'Access Denied')

@section('content')

        <!-- Main centered error card layout -->
        <div class="login-card text-center">
            
            <!-- Brand Identity -->
            <a href="index.html" class="login-brand text-decoration-none">
                <i class="bi bi-asterisk"></i>
                <span>Spark Admin</span>
            </a>
            
            <!-- Giant 404 header with spinning asterisk Zero -->
            <div class="error-title-huge">
                <span>4</span>
                <i class="bi bi-asterisk"></i>
                <span>3</span>
            </div>
            
            <h2 class="error-subtitle">Access Denied</h2>
            <p class="error-desc">
                Sorry but you do not have permission to access this page.
            </p>
            @if (auth()->user()->role_id ==5)
            <a href="{{ route('users.show',['user' => auth()->user()->id]) }}" class="btn-custom btn-custom-primary">
                <i class="bi bi-person"></i>
                 Back to Profile</a>
                </a>
            
                
                @else
         
            <div class="error-actions-group">
                <a href="{{ route('dashboard') }}" class="btn-custom btn-custom-primary">
                    <i class="bi bi-house"></i> Back to Dashboard   
                </a>
            </div>
               @endif
        </div>

@endsection