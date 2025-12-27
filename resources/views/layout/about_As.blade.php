
@vite('resources/css/FrontEnd/Front_Pages/about.css')
@extends('layout.app')

@section('title', 'About')

@section('content')
<div class="about-container">
    <!-- الهيدر -->
    <div class="about-header">
        <h1>من نحن</h1>
        <p>تعرف أكثر على مشروعنا والفريق المسؤول عنه.</p>
    </div>

    <!-- وصف المشروع -->
    <div class="about-content">
        <div class="about-text">
            <h2>عن المشروع</h2>
            <p>
                نظام <strong>إدارة الموظفين</strong> مصمم لتنظيم وإدارة جميع المعلومات الإدارية الخاصة بالموظفين داخل الشركة. 
                من خلال لوحة تحكم سهلة الاستخدام، يمكن للمديرين والمسؤولين متابعة الحضور، المهام، الأقسام، وإنشاء تقارير تفصيلية بكفاءة عالية.
            </p>

            <h2>رسالتنا</h2>
            <p>
                رسالتنا هي تبسيط عمليات إدارة الموظفين، تقليل الأخطاء، وزيادة الإنتاجية من خلال تقديم نظام مركزي سهل الاستخدام، آمن وقابل للتطوير.
            </p>

            <h2>أهم المميزات</h2>
            <ul>
                <li>متابعة حضور الموظفين</li>
                <li>إدارة وتوزيع المهام</li>
                <li>تنظيم الأقسام والفرق</li>
                <li>إعداد تقارير وتحليلات مفصلة</li>
                <li>الوصول الآمن للمسؤولين والمديرين</li>
            </ul>
        </div>

        <div class="about-image">
            <img src="https://cdn-icons-png.flaticon.com/512/3063/3063824.png" alt="صورة فريق العمل">
        </div>
    </div>

    <!-- قسم الفريق -->
    <div class="team-section">
        <h2>تعرف على فريقنا</h2>
        <div class="team-cards">
           <div class="team-card">
    <img src="/layout/anas1.png" alt="انس">
    <h3>Eng.Anas</h3>
   
    
</div>

            <div class="team-card">
               <img src="/layout/ahmad.png" alt="احمد">
                <h3>Eng.Ahmad</h3>
              
            </div>
            <div class="team-card">
                <img src="/layout/nour.jpeg" alt="عبد">
                <h3>Eng.mohamed</h3>
              
            </div>
        </div>
    </div>
</div>
@endsection
