<style>
  @import url('https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap');
  .loader {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    z-index: 1000;
    background-color: white;
  }
  .loader p {
    font-family: "Spartan", sans-serif;
    font-weight: 700;
    font-size: 30px;
    margin: 8px 0px 0px 15px;
    color: #5465DC;
  }

  .loader p span {
    animation-name: dots;
    animation-duration: 0.4s;
    animation-direction: alternate;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    position: relative;
    animation-delay: 0s;
  }

  @keyframes dots {
    0% {
      bottom: 0px;
    }
    100% {
      bottom: 3px;
    }
  }
</style>

<div class="loader">
  <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M8.03937 0.216074C6.54908 0.680935 5.09981 2.07552 4.5119 3.66152C4.23845 4.37248 4.18376 5.01509 3.92398 10.5798C3.62319 17.2519 3.62319 17.3749 4.33415 18.7832C4.74433 19.5899 5.78343 20.6563 6.54908 21.0391C8.01203 21.7911 9.98085 21.9142 11.2797 21.3399L11.895 21.0665V26.221V31.3755L11.3481 31.6899C10.7739 32.0181 10.1176 32.8658 9.87148 33.6177C9.7621 33.9322 9.70741 35.5729 9.70741 38.7586V43.4209L8.9691 43.6533C7.46513 44.1318 5.9475 45.417 5.14083 46.8936C4.30681 48.425 4.33415 48.1789 4.27946 58.1324L4.22477 67.2655H2.54307C0.902382 67.2655 0.847692 67.2792 0.49221 67.621C-0.0136691 68.1406 -0.0136691 69.125 0.49221 69.6445L0.861364 70H35.0013H69.1413L69.5105 69.6445C70.0164 69.125 70.0164 68.1406 69.5105 67.621C69.1413 67.2655 69.1413 67.2655 66.9127 67.2655H64.6841L64.6431 58.064C64.6021 50.134 64.5611 48.7941 64.3833 48.2609C63.5903 45.9913 62.1547 44.4736 60.1312 43.7216L59.3382 43.4345V39.1687C59.3382 36.8171 59.2699 34.5611 59.2015 34.1646C59.0101 33.1666 58.4358 32.2779 57.6702 31.7856L57.0276 31.3755V26.221L57.0139 21.0665L57.6702 21.3673C58.1897 21.6134 58.5726 21.6681 59.6937 21.6681C61.0062 21.6681 61.102 21.6407 62.1 21.1485C63.1665 20.629 64.1782 19.6992 64.6294 18.8105C65.0123 18.0722 65.2173 17.0468 65.2173 15.8573C65.2173 14.0389 64.8072 5.63034 64.6841 4.70062C64.4243 2.92321 63.1938 1.28252 61.5395 0.489522L60.6371 0.0656774L34.6595 0.0383326C12.4145 0.0246602 8.58627 0.0383326 8.03937 0.216074ZM11.895 9.73206C11.895 16.2538 11.8676 16.787 11.6352 17.2929C10.7875 19.1387 8.31282 19.3985 7.12332 17.7714C6.89089 17.457 6.67213 16.9921 6.61744 16.7323C6.50807 16.1307 6.94558 6.01317 7.137 5.06978C7.2327 4.52288 7.41044 4.19474 7.82062 3.74355C8.53158 2.96423 9.10582 2.78648 10.9106 2.74547L11.895 2.7318V9.73206ZM20.3445 9.86879L20.3035 17.0195L19.8933 17.621C18.8542 19.166 16.735 19.2754 15.4908 17.8671C15.2447 17.5937 14.985 17.1425 14.9166 16.8554C14.8209 16.5272 14.7662 13.8611 14.7662 9.52698V2.7318H17.569H20.3856L20.3445 9.86879ZM28.8488 9.52698C28.8488 13.8611 28.7941 16.5272 28.6984 16.8554C28.63 17.1425 28.3702 17.5937 28.1241 17.8671C26.8936 19.2617 24.7881 19.166 23.7216 17.6484L23.3114 17.0605L23.2704 9.89613L23.2294 2.7318H26.0459H28.8488V9.52698ZM37.3257 9.28087C37.3257 13.1502 37.271 16.1171 37.1889 16.5546C36.6831 19.207 33.1009 19.7129 31.9797 17.2929C31.7473 16.787 31.72 16.2538 31.72 9.73206V2.7318H34.5228H37.3257V9.28087ZM45.6658 9.73206C45.6658 16.2538 45.6385 16.787 45.406 17.2929C44.2849 19.7129 40.7027 19.207 40.1969 16.5546C40.1148 16.1171 40.0601 13.1502 40.0601 9.28087V2.7318H42.863H45.6658V9.73206ZM54.1154 9.80043C54.0743 16.6776 54.0607 16.8964 53.7872 17.4296C53.172 18.6055 51.6543 19.1523 50.3965 18.6738C49.6582 18.3867 48.8788 17.5663 48.6874 16.8554C48.5917 16.5272 48.537 13.9021 48.537 9.52698V2.7318H51.3399H54.1564L54.1154 9.80043ZM60.3773 3.14197C61.0199 3.45643 61.5805 4.14005 61.7856 4.87836C61.8539 5.11079 62.018 7.79058 62.1547 10.8395C62.4145 16.9511 62.4008 17.1015 61.6489 17.9765C60.5004 19.2891 58.3538 19.0703 57.4104 17.539L57.0823 17.0195L57.0413 9.85512L57.0002 2.69078L58.3811 2.77281C59.3929 2.8275 59.8988 2.92321 60.3773 3.14197ZM23.9404 21.3399C25.8819 22.0782 28.2745 21.6817 29.6965 20.3965L30.216 19.9317L30.7219 20.3692C32.7317 22.1329 36.1088 22.1466 38.1597 20.3965L38.6929 19.9317L39.2261 20.3965C41.277 22.1466 44.6541 22.1329 46.6639 20.3692L47.1698 19.9317L47.6893 20.3965C49.1113 21.6817 51.7774 22.1193 53.5274 21.3399L54.1427 21.0665V26.18C54.1427 31.2251 54.1427 31.2934 53.8556 31.4438C53.3224 31.731 52.4883 32.5923 52.1876 33.1392C51.9004 33.6861 51.8868 33.8775 51.8457 38.5125L51.8047 43.3388H43.4782H35.1381V40.8368C35.1381 37.9519 35.015 37.3503 34.2083 36.2975C33.8529 35.8327 33.429 35.4772 32.8274 35.1764L31.9661 34.7252H24.5283H17.0905V34.3971C17.0905 33.4947 16.3522 32.2915 15.4361 31.6899L14.7662 31.2661V26.18V21.1075L15.7643 21.4356C17.5417 22.0372 19.6336 21.6817 21.1239 20.5196L21.8075 20L22.5184 20.5333C22.9013 20.8341 23.5439 21.1895 23.9404 21.3399ZM13.7134 34.0553C13.8775 34.151 14.0552 34.2877 14.1099 34.3697C14.1646 34.4518 14.2193 36.5026 14.2193 38.9226V43.3388H13.399H12.5786V38.9226C12.5786 36.5026 12.6333 34.4518 12.688 34.3697C12.77 34.2467 13.2486 33.9185 13.3716 33.9049C13.399 33.9049 13.5494 33.9732 13.7134 34.0553ZM56.2619 34.4654C56.426 34.7799 56.467 35.6413 56.467 39.1004V43.3388H55.5783H54.6896V38.9226C54.6896 34.8756 54.7169 34.4791 54.9357 34.2877C55.4553 33.8228 55.9748 33.8912 56.2619 34.4654ZM22.8329 40.4676V43.3388H19.9617H17.0905V40.4676V37.5964H19.9617H22.8329V40.4676ZM31.6653 37.8425C32.2122 38.28 32.2669 38.5945 32.2669 41.0008V43.3388H28.9855H25.7041V40.4676V37.5964H28.548C31.0227 37.5964 31.4192 37.6374 31.6653 37.8425ZM15.86 56.7378V67.2655H11.4848H7.09598L7.15067 58.3511C7.17801 51.2688 7.2327 49.3137 7.36943 48.9172C7.71124 48.0011 8.49056 47.1397 9.42029 46.6612L10.2816 46.21H13.0708H15.86V56.7378ZM50.2051 47.0987C50.2734 48.2746 50.6699 48.7121 51.6133 48.7121C52.5704 48.7121 52.9532 48.2746 53.0216 47.0987L53.0763 46.1964L55.9748 46.2374C58.7366 46.2784 58.887 46.2921 59.516 46.6202C60.309 47.0167 61.0473 47.796 61.4438 48.6574C61.7309 49.2726 61.7309 49.423 61.7719 58.2691L61.8129 67.2655H57.4378H53.0626L53.0216 63.0134L52.9806 58.7613L52.5294 58.3648C51.8321 57.7495 50.8613 57.8726 50.4101 58.6519C50.2051 58.9937 50.1777 59.5543 50.1777 63.1501V67.2655H34.4544H18.7312V56.7378V46.21H34.4408H50.1504L50.2051 47.0987Z" fill="#5465DC"/>
    <path d="M50.875 52.1439C50.0957 52.5677 49.959 53.6068 50.5742 54.3041C50.916 54.6869 51.0664 54.7553 51.6133 54.7553C52.1602 54.7553 52.3106 54.6869 52.6524 54.3041C53.7462 53.0872 52.3106 51.3509 50.875 52.1439Z" fill="#5465DC"/>
  </svg>
  <p>
    KELONTONG<span>.</span><span style="animation-delay: 0.2s">.</span
    ><span style="animation-delay: 0.4s">.</span>
  </p>
</div>
