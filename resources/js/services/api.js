export async function apiRequest(url, options = {}) {
    const response = await fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            ...options.headers,
        },
        ...options,
    });

    return response.json();
}