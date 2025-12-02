// assets/js/main.js
document.addEventListener('DOMContentLoaded', function(){
    // small button "pop" on hover
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('mouseover', () => btn.style.transform = 'translateY(-3px) scale(1.02)');
        btn.addEventListener('mouseleave', () => btn.style.transform = '');
    });

    // subtle input focus effect (adds class)
    document.querySelectorAll('input, select').forEach(inp => {
        inp.addEventListener('focus', () => inp.classList.add('focused'));
        inp.addEventListener('blur', () => inp.classList.remove('focused'));
    });

    // small cute sparkle when clicking login button (temporary)
    const loginBtn = document.querySelector('.login-form button');
    if (loginBtn) {
        loginBtn.addEventListener('click', function(){
            for (let i=0;i<6;i++){
                const s = document.createElement('div');
                s.className = 'spark';
                s.style.position='absolute';
                s.style.width='8px';
                s.style.height='8px';
                s.style.background='radial-gradient(circle,#fff,#ffd6ff)';
                s.style.left=(Math.random()*80+10)+'%';
                s.style.top=(Math.random()*40+30)+'%';
                s.style.borderRadius='50%';
                s.style.opacity='0.9';
                s.style.transform='scale(0)';
                s.style.transition='all .6s ease';
                document.body.appendChild(s);
                setTimeout(()=>{ s.style.transform='scale(1) translateY(-30px)'; s.style.opacity='0'; }, 10);
                setTimeout(()=> s.remove(),700);
            }
        });
    }
});
