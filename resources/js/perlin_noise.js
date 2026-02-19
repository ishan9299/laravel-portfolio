
const render_perlin_noise = () => {
    const canvas = document.querySelector("#webgl-canvas");
    const gl_context = canvas.getContext("webgl2");

    if (gl_context == null) {
        console.log("webgl2 is not available");
        return;
    }

    const vertex_shader_string = `#version 300 es
precision mediump float;
in highp vec4 a_vertex_position;
void main(void) {
    gl_Position = a_vertex_position;
}
`

    const frag_shader_string = `#version 300 es
precision highp float;

uniform float i_time;
uniform vec2 i_resolution;

out vec4 frag_color;

#define hash3(p) fract(sin(1e3 * dot(p, vec3(1, 57, -13.7))) * 4375.5453)

float noise3(vec3 x) {

    vec3 p = floor(x);
    vec3 f = fract(x);

    f = f * f * (3.0 - 2.0 * f);

    return mix(
        mix(
            mix(hash3(p + vec3(0, 0, 0)), hash3(p + vec3(1, 0, 0)), f.x),
            mix(hash3(p + vec3(0, 1, 0)), hash3(p + vec3(1, 1, 0)), f.x), f.y),
        mix(
            mix(hash3(p + vec3(0, 0, 1)), hash3(p + vec3(1, 0, 1)), f.x),
            mix(hash3(p + vec3(0, 1, 1)), hash3(p + vec3(1, 1, 1)), f.x), f.y), f.z);

}

#define noise(x) (noise3(x) + noise3(x + 11.5)) / 2.0

void main(void) {
    vec2 R = i_resolution.xy;
    vec2 frag_coord = gl_FragCoord.xy;
    float n = noise(vec3(frag_coord * 8.0 / R.y, 0.1 * i_time));
    float v = sin(6.28 * 5.0 * n);
    float t = i_time;

    float threshold = 0.9 * abs(v);
    v = smoothstep(1.0, 0.0, threshold);

    vec3 color1 = vec3(0.98, 0.79, 0.50); // mimosa
    vec3 color2 = vec3(0.98, 0.85, 0.69); // peach
    vec3 color3 = vec3(0.96, 0.59, 0.44); // coral
    vec3 color4 = vec3(0.965,0.592,0.439); // crimson

    vec3 white = vec3(1., 1., 1.);
    vec3 red = vec3(0.231,0.016,0.016);

    vec3 final_color = mix(
        mix(color1, color2, noise(vec3(frag_coord * 8.0 / R.y, 0.1 * t))),
        mix(red, color4, noise(vec3(frag_coord * 8.0 / R.y + 5.0, 0.1 * t))),
        v);

    frag_color = vec4(final_color, 1.0);
}
`

    const compile_shaders = (shader_source, shader_type) => {
        let shader_id = gl_context.createShader(shader_type);
        gl_context.shaderSource(shader_id, shader_source);
        gl_context.compileShader(shader_id);
        let shader_type_str = "vertex_shader"
        if (shader_type === gl_context.FRAGMENT_SHADER) {
            shader_type_str = "fragment_shader"
        }
        if (!gl_context.getShaderParameter(shader_id, gl_context.COMPILE_STATUS)) {
            console.log(`compile err on ${shader_type_str}: ${gl_context.getShaderInfoLog(shader_id)}`);
            gl_context.deleteShader(shader_id);
            return null;
        }
        return shader_id;
    }

    const vertex_shader_id = compile_shaders(
        vertex_shader_string,
        gl_context.VERTEX_SHADER
    );

    const frag_shader_id = compile_shaders(
        frag_shader_string,
        gl_context.FRAGMENT_SHADER
    );

    const shader_prg_id = gl_context.createProgram();
    gl_context.attachShader(shader_prg_id, vertex_shader_id);
    gl_context.attachShader(shader_prg_id, frag_shader_id);
    gl_context.linkProgram(shader_prg_id);
    if (!gl_context.getProgramParameter(shader_prg_id, gl_context.LINK_STATUS)) {
        console.error('Unable to initialize the shader program: ' + gl_context.getProgramInfoLog(shader_prg_id));
        return;
    }

    gl_context.useProgram(shader_prg_id);

    const vertex_pos = gl_context.getAttribLocation(shader_prg_id, "a_vertex_position");
    const vertices = new Float32Array([
        1.0,  1.0,
        1.0, -1.0,
        -1.0,  1.0,
        1.0, -1.0,
        -1.0, -1.0,
        -1.0,  1.0,
    ]);

    const position_buffer = gl_context.createBuffer();
    gl_context.bindBuffer(gl_context.ARRAY_BUFFER, position_buffer);
    gl_context.bufferData(gl_context.ARRAY_BUFFER, vertices, gl_context.STATIC_DRAW);

    gl_context.vertexAttribPointer(vertex_pos, 2, gl_context.FLOAT, false, 0, 0);
    gl_context.enableVertexAttribArray(vertex_pos);

    const i_resolution = gl_context.getUniformLocation(shader_prg_id, "i_resolution");
    const i_time = gl_context.getUniformLocation(shader_prg_id, "i_time");

    window.addEventListener("resize", () => {
        gl_context.viewport(0, 0, canvas.width, canvas.height);
    });

    const render = (time) => {
        gl_context.uniform2f(i_resolution, canvas.width, canvas.height);
        gl_context.uniform1f(i_time, time * 0.01);

        gl_context.clear(gl_context.COLOR_BUFFER_BIT);

        gl_context.viewport(0, 0, canvas.width, canvas.height);
        gl_context.drawArrays(gl_context.TRIANGLES, 0, vertices.length/2);

        requestAnimationFrame(render);
    }

    requestAnimationFrame(render);
}

render_perlin_noise();

