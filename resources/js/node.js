const socket = io.connect(`${window.location.protocol}//${window.location.hostname}:3000`);

export { socket };