
 function showLargeCard(element) {
    var largeCard = document.getElementById('large-card');
    var imgSrc = element.querySelector('img').src;
    largeCard.querySelector('img').src = imgSrc;

  
    var rect = element.getBoundingClientRect();
    var top = rect.top + window.scrollY;
    var left = rect.left + window.scrollX;


    largeCard.style.top = top + 'px';
    largeCard.style.left = left + 'px';

    largeCard.style.display = 'block';


    event.stopPropagation();
}


document.addEventListener('click', function(event) {
    var largeCard = document.getElementById('large-card');
    if (!largeCard.contains(event.target)) {
        largeCard.style.display = 'none';
    }
});


document.getElementById('large-card').addEventListener('click', function(event) {
    event.stopPropagation();
});
