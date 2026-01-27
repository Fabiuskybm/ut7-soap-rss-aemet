
export const $ = (sel) => document.querySelector(sel);


export const dom = {
    status: $('[data-rss-status]'),
    content: $('[data-rss-content]'),
    refresh: $('[data-rss-refresh]'),
    updated: $('[data-rss-updated]'),
    count: $('[data-rss-count]'),
};