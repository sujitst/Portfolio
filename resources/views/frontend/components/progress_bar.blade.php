<div class="skills_section">
    <h3>{{ __('common.skills_progress_stages') }}</h3>
    <div id="project-list"></div>
    <div type="application/json" id="jsonData" class="json_skill">{!! json_encode($skills) !!}</div>
</div>



<!--=====|| DYNAMICALLY RENDERS PROJECT PROGRESS BARS & ANIMATE THEM ON SCROLL ||=====-->
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const data = JSON.parse(document.getElementById('jsonData').textContent);
        const projectList = document.getElementById('project-list');

        data.forEach(project => {
            const projectContainer = document.createElement('div');
            projectContainer.className = 'project-container';

            const projectTitle = document.createElement('div');
            projectTitle.className = 'project-title';
            projectTitle.textContent = project.name;

            const progressContainer = document.createElement('div');
            progressContainer.className = 'progress-bar-container';

            const progressBar = document.createElement('div');
            progressBar.className = 'progress-bar';
            progressBar.dataset.target = parseInt(project.percent);
            progressBar.textContent = '0%';

            progressContainer.appendChild(progressBar);
            projectContainer.appendChild(projectTitle);
            projectContainer.appendChild(progressContainer);
            projectList.appendChild(projectContainer);
        });


        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.animated) {
                    animateProgress(entry.target);
                    entry.target.dataset.animated = 'true';
                }
            });
        }, { threshold: 0.4 });
        document.querySelectorAll('.progress-bar').forEach(bar => {
            observer.observe(bar);
        });


        function animateProgress(bar) {
            let current = 0;
            const target = bar.dataset.target;

            const timer = setInterval(() => {
                if (current >= target) {
                    clearInterval(timer);
                    return;
                }
                current++;
                bar.style.width = current + '%';
                bar.textContent = current + '%';
            }, 15);
        }
    });
</script>