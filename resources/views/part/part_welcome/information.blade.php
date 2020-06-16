<section id="info" class="faq section-bg">
   <div class="container" data-aos="fade-up">

     <div class="section-title">
       <h2>Pengumuman</h2>
       <p>Lihat Dan Baca Pengumuman Terbaru.</p>
     </div>

     <div class="faq-list">
       <ul>
         @foreach ($info as $inf)
          <li data-aos="fade-up" data-aos-delay="100">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">{{$inf['judul']}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-2" class="collapse" data-parent=".faq-list">
              <p>
                {{$inf['info']}}     
              </p>
            </div>
          </li>
         @endforeach
             
       </ul>
     </div>
   </div>
 </section>