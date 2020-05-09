import Selector from '@tools/Selector';
import { C } from '@entities/C';
import Extractor from '@tools/Extractor';

/**
 * ...
 */
class Target {
    /**
     * ...
     *
     * @type string
     */
    private readonly panelKey: string;

    /**
     * ...
     *
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * ...
     *
     * @type Array<string>
     */
    private readonly layerKeychain: Array<string>;

    /**
     * ...
     *
     * @type boolean
     */
    private readonly valid: boolean = false;

    /**
     * The constructor.
     *
     * @param target { string }
     *   ...
     */
    public constructor(target: string) {
        const keychain = this.extractKeychain(target);

        if (keychain === null) {
            return;
        }

        this.panelKey = keychain[0];
        this.layerKeychain = keychain.slice(1);

        const panel = Selector.panel(this.panelKey);
        const layer = Selector.layer(this.panelKey, this.layerKeychain.join('.'));

        if (panel === null) {
            return;
        }

        if (this.layerKeychain.length > 0 && layer === null) {
            return;
        }

        this.valid = true;
        this.side = Extractor.side(panel);
    }

    /**
     * ...
     *
     * @param hash { string }
     *   ...
     *
     * @return Array<string>
     */
    private extractKeychain(hash: string): Array<string> {
        if (hash === null || hash === '') {
            return null;
        }

        const result = hash.split('.')
            .map((item: string) => item.trim())
            .filter((item: string) => item !== '');

        if (result.length === 0) {
            return null;
        }

        return result;
    }

    /**
     * ...
     *
     * @type string
     */
    public getPanelKey(): string {
        return this.panelKey;
    }

    /**
     * ...
     *
     * @type Array<string>
     */
    public getLayerKeychain(): Array<string> {
        return this.layerKeychain;
    }

    /**
     * ...
     *
     * @type C.side
     */
    public getSide(): C.side {
        return this.side;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public isValid(): boolean {
        return this.valid;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public hasLayers(): boolean {
        return this.layerKeychain.length > 0;
    }
}

export default Target;
