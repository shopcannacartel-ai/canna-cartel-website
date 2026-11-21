import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { spawnSync } from 'node:child_process';
const cwd = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const required = [
  'wordpress/themes/canna-cartel-unified/style.css',
  'wordpress/themes/canna-cartel-unified/functions.php',
  'wordpress/themes/canna-cartel-unified/front-page.php',
  'wordpress/themes/canna-cartel-unified/theme.json',
  'wordpress/plugins/canna-cartel-bridge/canna-cartel-bridge.php',
  'integrations/base44/WordPressUpdates.jsx',
  'preview/index.html'
];
let failures = 0;
for (const p of required) { if (!fs.existsSync(path.join(cwd, p))) { console.error('Missing:', p); failures++; }}
try { const d=JSON.parse(fs.readFileSync(path.join(cwd, 'wordpress/themes/canna-cartel-unified/theme.json'), 'utf8'));
  if (d.version !== 3) throw new Error('Theme.json version 3 expected');
  console.log('theme.json: valid');
} catch(err){console.error(err.message); failures++;}
const walk=(dir) => fs.readdirSync(dir,{withFileTypes:true}).flatMap(e=>e.isDirectory()? walk(path.join(dir,e.name)):[path.join(dir,e.name)]);
const phpFiles=walk(path.join(cwd,'wordpress')).filter(f=>f.endsWith('.php'));
const php=spawnSync('php',['-v'],{encoding:'utf8'});
if (!php.error) for(const f of phpFiles){const r=spawnSync('php',['-l',f],{encoding:'utf8'}); if(r.status!==0){console.error(r.stdout+r.stderr);failures++;}else console.log('PHP lint:',path.relative(cwd,f));}
else console.log('PHP not installed: PHP lint skipped (CI checks it).');
for (const file of walk(path.join(cwd,'wordpress/themes/canna-cartel-unified/assets/images')).filter(f=>f.endsWith('.webp'))){
 const sig=fs.readFileSync(file).subarray(0,12);
 if(sig.toString('ascii',0,4)!=='RIFF'||sig.toString('ascii',8,12)!=='WEBP'){console.error('Invalid WebP:',file);failures++;}
}
if (failures) process.exit(1);
console.log('Canna Cartel repository structure validated.');
