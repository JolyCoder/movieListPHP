addEventListener('DOMContentLoaded', function() {
  var movieSection = document.querySelector('#movie-sec');
  if(movieSection){
    movieSection.addEventListener('click', sectionTarget);
    function sectionTarget(event) {
      if(event.target.classList.contains('movie_watched')){
        var btn = event.target;
        var movieId = btn.parentNode.getAttribute('data-movie-id');
        var watchedCounter = document.querySelector('#watched_count');
        var currentCount = watchedCounter.textContent;
        doAjax({
          method: 'POST',
          url: 'logic/watched_movie.php',
          data: 'watched_id=' + movieId,
          contentType: 'application/x-www-form-urlencoded',
          callback: function() {
            if(btn.classList.contains('movie_watched_active')){
              btn.textContent = '(Не смотрел)';
              --currentCount;
            }
            else {
              btn.textContent = '(Смотрел)';
              ++currentCount;
            }
            btn.classList.toggle('movie_watched_active');
            watchedCounter.textContent = currentCount;
          }
        });
      }
      if(event.target.classList.contains("movie_del")){
          event.preventDefault();
          var movie = {};
          movie.container = event.target.parentNode;
          movie.id = movie.container.getAttribute('data-movie-id');
          movie.title = movie.container.firstElementChild.textContent;
          doAjax({
            method: 'POST',
            url: 'logic/del_movie.php',
            data: 'del_id=' + movie.id,
            contentType: 'application/x-www-form-urlencoded',
            callback: delMovie
          });
          function delMovie(response) {
            if(response)
            {
              alert('Фильм ' + movie.title + ' был успешно удален!')
              movie.container.nextElementSibling.remove();
              movie.container.remove();
            }
            else{
              alert('Во время удаления фильма произошла ошибка, попробуйте еще раз позже!');
            }
          }
        }
    }
  }
  if(document.forms.addFilm) {
    document.forms.addFilm.addEventListener('submit', newFilm);
    function newFilm(event) {
      event.preventDefault();
      var formData = new FormData(this);
      doAjax({
        method: 'POST',
        url: 'logic/addMovie.php',
        data: formData,
        contentType: 'application/x-www-form-application',
        callback: function(response) {
          alert(response);
        }
      });
    }
  }
});
