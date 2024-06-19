const listImage = document.querySelector('.list-images');
const imgs = document.getElementsByTagName('img');
const btnLeft = document.querySelector('.btn-left');
const btnRight = document.querySelector('.btn-right');
const length = imgs.length;
let current = 0;

const handleChangeSlide = () => {
  if (current === length - 1) {
    listImage.style.transform = 'translateX(0)';
    current = 0;
  } else {
    current++;
    listImage.style.transform = `translateX(-${current * 100}%)`;
  }

  document.querySelector('.active').classList.remove('active');
  document.querySelector('.index-item-' + current).classList.add('active');
};

let slideInterval = setInterval(handleChangeSlide, 3000);

btnRight.addEventListener('click', () => {
  handleChangeSlide();
});

btnLeft.addEventListener('click', () => {
  if (current === 0) {
    current = length - 1;
    listImage.style.transform = `translateX(-${current * 100}%)`;
  } else {
    current--;
    listImage.style.transform = `translateX(-${current * 100}%)`;
  }

  document.querySelector('.active').classList.remove('active');
  document.querySelector('.index-item-' + current).classList.add('active');
});

const restartSlideInterval = () => {
  clearInterval(slideInterval);
  slideInterval = setInterval(handleChangeSlide, 3000);
};

listImage.addEventListener('mouseover', restartSlideInterval);
listImage.addEventListener('touchstart', restartSlideInterval);

// form 64 tinh thanh VN
 