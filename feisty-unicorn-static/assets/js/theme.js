(function () {
  const navToggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.site-nav');

  if (navToggle && nav) {
    navToggle.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('is-open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  const slider = document.querySelector('[data-slider]');
  if (slider) {
    let index = 0;
    const testimonials = slider.querySelectorAll('.testimonial');
    if (testimonials.length >= 1) {
      testimonials[index].classList.add('is-active');
    }
    if (testimonials.length > 1) {
      setInterval(() => {
        testimonials[index].classList.remove('is-active');
        index = (index + 1) % testimonials.length;
        testimonials[index].classList.add('is-active');
      }, 6000);
    }
  }

  const canvas = document.querySelector('[data-arcade-canvas]');
  const startButton = document.querySelector('[data-arcade-start]');
  const scoreDisplay = document.querySelector('[data-arcade-score]');

  if (canvas && startButton && scoreDisplay) {
    const ctx = canvas.getContext('2d');
    const width = canvas.width;
    const height = canvas.height;
    const ground = height - 44;
    const gravity = 0.6;

    const player = { x: 60, y: ground, width: 42, height: 42, vy: 0, jumping: false };
    let beans = [];
    let goblins = [];
    let stars = [];
    let animationFrame;
    let frame = 0;
    let score = 0;
    let isRunning = false;

    const colors = {
      player: '#f472b6',
      playerOutline: '#fdf2ff',
      bean: '#facc15',
      goblin: '#22d3ee',
      ground: '#2a0f3f',
    };

    function setupStars() {
      stars = Array.from({ length: 40 }, () => ({
        x: Math.random() * width,
        y: Math.random() * height * 0.7,
        size: Math.random() * 2 + 1,
      }));
    }

    function resetGame() {
      beans = [];
      goblins = [];
      frame = 0;
      score = 0;
      player.x = 60;
      player.y = ground;
      player.vy = 0;
      player.jumping = false;
      setupStars();
      updateScore();
    }

    function updateScore(text) {
      scoreDisplay.textContent = text || `Score: ${score}`;
    }

    function spawnBean() {
      beans.push({
        x: width + 30,
        y: ground - 60 - Math.random() * 80,
        radius: 10,
        speed: 3.2,
      });
    }

    function spawnGoblin() {
      const size = 34 + Math.random() * 18;
      goblins.push({
        x: width + 30,
        y: ground - size + 6,
        width: size,
        height: size,
        speed: 3 + Math.random() * 1.5 + Math.min(score / 150, 2),
      });
    }

    function drawBackground() {
      ctx.fillStyle = '#120b26';
      ctx.fillRect(0, 0, width, height);
      stars.forEach((star) => {
        ctx.fillStyle = 'rgba(255,255,255,0.8)';
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
        ctx.fill();
        star.x -= 0.6;
        if (star.x < -2) {
          star.x = width + Math.random() * 20;
          star.y = Math.random() * height * 0.7;
        }
      });
      ctx.fillStyle = colors.ground;
      ctx.fillRect(0, ground + player.height - 4, width, height - ground);
    }

    function drawPlayer() {
      ctx.fillStyle = colors.player;
      ctx.fillRect(player.x, player.y, player.width, player.height);
      ctx.strokeStyle = colors.playerOutline;
      ctx.lineWidth = 3;
      ctx.strokeRect(player.x, player.y, player.width, player.height);
      ctx.fillStyle = colors.playerOutline;
      ctx.fillRect(player.x + player.width - 10, player.y + 12, 6, 6);
    }

    function drawBeans() {
      beans.forEach((bean) => {
        ctx.fillStyle = colors.bean;
        ctx.beginPath();
        ctx.ellipse(bean.x, bean.y, bean.radius + 4, bean.radius, Math.PI / 6, 0, Math.PI * 2);
        ctx.fill();
        bean.x -= bean.speed;
      });
      beans = beans.filter((bean) => bean.x > -20);
    }

    function drawGoblins() {
      goblins.forEach((goblin) => {
        ctx.fillStyle = colors.goblin;
        ctx.fillRect(goblin.x, goblin.y, goblin.width, goblin.height);
        ctx.fillStyle = '#0f172a';
        ctx.fillRect(goblin.x + goblin.width * 0.6, goblin.y + goblin.height * 0.3, goblin.width * 0.2, goblin.height * 0.2);
        goblin.x -= goblin.speed;
      });
      goblins = goblins.filter((goblin) => goblin.x + goblin.width > -10);
    }

    function checkCollisions() {
      goblins.forEach((goblin) => {
        if (
          player.x < goblin.x + goblin.width &&
          player.x + player.width > goblin.x &&
          player.y < goblin.y + goblin.height &&
          player.y + player.height > goblin.y
        ) {
          endGame();
        }
      });

      beans.forEach((bean, index) => {
        const inX = bean.x + bean.radius > player.x && bean.x - bean.radius < player.x + player.width;
        const inY = bean.y + bean.radius > player.y && bean.y - bean.radius < player.y + player.height;
        if (inX && inY) {
          score += 10;
          updateScore();
          beans.splice(index, 1);
        }
      });
    }

    function updatePlayer() {
      player.vy += gravity;
      player.y += player.vy;
      if (player.y >= ground) {
        player.y = ground;
        player.vy = 0;
        player.jumping = false;
      }
    }

    function loop() {
      if (!isRunning) {
        return;
      }
      frame += 1;
      drawBackground();
      updatePlayer();
      drawPlayer();
      drawBeans();
      drawGoblins();
      checkCollisions();

      if (frame % 90 === 0) {
        spawnBean();
      }
      if (frame % 140 === 0) {
        spawnGoblin();
      }

      animationFrame = requestAnimationFrame(loop);
    }

    function jump() {
      if (!isRunning) {
        return;
      }
      if (!player.jumping) {
        player.vy = -11.5;
        player.jumping = true;
      }
    }

    function endGame() {
      isRunning = false;
      cancelAnimationFrame(animationFrame);
      updateScore(`Score: ${score} — Try again!`);
    }

    function startGame() {
      cancelAnimationFrame(animationFrame);
      resetGame();
      isRunning = true;
      updateScore();
      loop();
    }

    startButton.addEventListener('click', startGame);
    canvas.addEventListener('pointerdown', () => {
      if (!isRunning) {
        startGame();
      }
      jump();
    });

    document.addEventListener('keydown', (event) => {
      if (event.code === 'Space') {
        event.preventDefault();
        if (!isRunning) {
          startGame();
        }
        jump();
      }
    });

    setupStars();
  }
})();
