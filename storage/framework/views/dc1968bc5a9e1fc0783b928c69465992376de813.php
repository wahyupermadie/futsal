<!DOCTYPE html>
<html>

<head>
    <?php echo $__env->make('templatesFutsal.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->startSection('css'); ?>

    <?php echo $__env->yieldSection(); ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <header>
        <?php $__env->startSection('header'); ?>
            <?php echo $__env->make('templatesFutsal.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('templatesFutsal.includes.leftSidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
    </header>
    <section class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </section>
    
    <?php echo $__env->make('templatesFutsal.includes.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->startSection('js'); ?>
    
    <?php echo $__env->yieldSection(); ?>
</body>

</html>