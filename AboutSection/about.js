// Leadership team data
const leadershipTeam = [
    {
        name: 'Sarah Johnson',
        title: 'Chief Executive Officer',
        bio: 'Sarah brings over 20 years of experience in strategic leadership and innovation...',
        image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=200&h=200'
    },
    {
        name: 'Michael Chen',
        title: 'Chief Technology Officer',
        bio: 'Michael is a technology veteran with expertise in emerging technologies...',
        image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=200&h=200'
    },
    {
        name: 'Elena Rodriguez',
        title: 'Chief Operations Officer',
        bio: 'Elena excels in optimizing organizational efficiency and driving growth...',
        image: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&q=80&w=200&h=200'
    }
];

// FAQ data
const faqs = [
    {
        question: 'What does GEPO stand for?',
        answer: 'GEPO stands for Global Empowerment and Progress Organization, reflecting our commitment to worldwide development and innovation.'
    },
    {
        question: 'How can I get involved with GEPO?',
        answer: 'There are multiple ways to get involved with GEPO, including career opportunities, partnerships, and volunteer programs. Contact our team to learn more.'
    },
    {
        question: 'What industries does GEPO serve?',
        answer: 'GEPO serves various sectors including technology, healthcare, education, and sustainable development, focusing on creating positive impact across multiple domains.'
    }
];

function LeadershipCard(leader) {
    return `
        <div class="leadership-card bg-white rounded-lg shadow-lg p-6 transition-all duration-300 hover:shadow-xl">
            <img src="${leader.image}" alt="${leader.name}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover" />
            <h3 class="text-xl font-bold text-blue-800 text-center">${leader.name}</h3>
            <p class="text-gray-600 text-center mb-2">${leader.title}</p>
            <p class="text-sm text-gray-700 mt-2">${leader.bio}</p>
        </div>
    `;
}

function FAQItem(faq) {
    return `
        <div class="border-b border-gray-200 py-4">
            <button class="flex justify-between items-center w-full text-left" onclick="toggleFAQ(this)">
                <span class="text-lg font-medium text-blue-800">${faq.question}</span>
                <span class="toggle-icon text-blue-600">⌄</span>
            </button>
            <p class="mt-2 text-gray-600 hidden">${faq.answer}</p>
        </div>
    `;
}

function toggleFAQ(button) {
    const answer = button.nextElementSibling;
    const icon = button.querySelector('.toggle-icon');
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.textContent = '^';
    } else {
        answer.classList.add('hidden');
        icon.textContent = '⌄';
    }
}

function render() {
    const root = document.getElementById('root');
    root.innerHTML = `
        <div class="min-h-screen bg-gray-50">
            <div class="bg-blue-800 text-white py-20">
                <div class="container mx-auto">
                    <h1 class="text-4xl font-bold text-center text-blue-100 mb-4">About GEPO</h1>
                    <p class="text-xl text-center text-blue-100">Empowering Communities Through Innovation</p>
                </div>
            </div>

            <section class="py-16 bg-white">
                <div class="container mx-auto">
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center p-6">
                            <h2 class="text-2xl font-bold text-blue-800 mb-4">Vision</h2>
                            <p class="text-gray-600">The vision of JIS Gepo is to become a leader in promoting knowledge excellence that transcends boundaries and reaches global audiences. It aims to inspire and cultivate an environment where learning becomes the driving force for societal development. Through fostering a culture of creativity, imagination, and ambition, JIS Gepo envisions empowering individuals to achieve their fullest potential. This vision sees education not merely as an acquisition of facts, but as a transformative process that shapes individuals into innovators, thinkers, and problem solvers. The global outreach of this vision seeks to connect diverse communities, enriching them with opportunities for growth, exposure, and knowledge sharing. By fostering holistic development, JIS Gepo aims to create a world where education leads to tangible societal progress. The organization's commitment to knowledge excellence also reflects its pursuit of continuous improvement, adaptation to emerging trends, and the integration of new learning methodologies. In a world where change is constant, the vision of JIS Gepo emphasizes adaptability and resilience, ensuring that learning remains relevant and impactful in all areas of life. Ultimately, the vision aims to make a positive impact, transforming individuals, communities, and society through education.</p>
                        </div>
                        <div class="text-center p-6">
                            <h2 class="text-2xl font-bold text-blue-800 mb-4">Mission</h2>
                            <p class="text-gray-600">JIS Gepo’s mission is to advance and enhance learning opportunities by creating a dynamic and comprehensive environment for knowledge acquisition. The core focus of the mission is to foster awareness among individuals and equip them with the necessary tools to thrive in an ever-evolving world. It seeks to accomplish this by promoting creativity, innovation, and critical thinking, encouraging students and learners to explore and challenge conventional ideas. The mission goes beyond traditional education; it integrates exposure and interaction with real-world scenarios to create well-rounded individuals capable of contributing meaningfully to society. JIS Gepo understands that learning is not confined to the classroom, and as such, it encourages experiential learning, collaboration, and exposure to diverse perspectives. By offering opportunities for personal and professional growth, the organization aims to cultivate self-reliant individuals who can adapt to challenges and succeed in various fields. The mission also recognizes the importance of inclusivity, ensuring that every individual, regardless of background, has access to high-quality educational experiences. Through these efforts, JIS Gepo seeks to prepare individuals not just for personal success, but to contribute to the advancement of society as a whole, creating a ripple effect of positive change.</p>
                        </div>
                        <div class="text-center p-6">
                            <h2 class="text-2xl font-bold text-blue-800 mb-4">Objectives</h2>
                            <ul class="text-gray-600 text-left list-disc pl-6">
                                <p>The objective of JIS Gepo is to enhance learning opportunities by fostering awareness, innovation, and holistic knowledge acquisition. It strives to create an educational ecosystem that nurtures creativity and exposes learners to diverse perspectives and ideas. By promoting awareness, the organization helps students develop a deeper understanding of the world around them, equipping them with the skills to make informed decisions. Innovation plays a central role in the objectives, with a focus on encouraging out-of-the-box thinking and problem-solving abilities. The organization recognizes that the future demands individuals who can innovate and lead, and therefore, it nurtures these qualities in its learners. Exposure is also a key objective, as JIS Gepo believes in offering learners the chance to engage with practical, real-world experiences that complement their theoretical knowledge. This interaction allows learners to apply what they’ve learned and gain insights that can shape their future endeavors. Ultimately, the objective is to build human talent, fostering individuals who are self-reliant, confident, and ready to contribute meaningfully to society. By focusing on these core areas—awareness, innovation, exposure, and interaction—JIS Gepo aims to produce well-rounded individuals capable of achieving both personal and societal success.
</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 bg-gray-50">
                <div class="container mx-auto">
                    <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Leadership Team</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        ${leadershipTeam.map(leader => LeadershipCard(leader)).join('')}
                    </div>
                </div>
            </section>

            <section class="py-16 bg-white faq-section">
                <div class="container mx-auto">
                    <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Frequently Asked Questions</h2>
                    <div class="max-w-2xl mx-auto">
                        ${faqs.map(faq => FAQItem(faq)).join('')}
                    </div>
                </div>
            </section>
        </div>
    `;
}
render();