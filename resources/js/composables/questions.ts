//rewrite to ts

import axios from 'axios';

const getQuestion = async (): Promise<{ question: string; answer: string }> => {
    let question = { question: '', answer: '' };
    try {
        const response = await axios.get('https://api.api-ninjas.com/v1/trivia', {
            headers: { 'X-Api-Key': 'D3BbHU5AqFOMPr/y+CNIWw==IC6LAI84kwYiyesD' }
        });
        const data = response.data[0];
        question = {
            question: data.question,
            answer: data.answer,
        };
    } catch (error) {
        console.error(error);
    }
    return question;
};

export default getQuestion;
