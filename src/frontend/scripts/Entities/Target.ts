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
     * @type Element
     */
    private readonly element: Element;

    /**
     * ...
     *
     * @type string
     */
    private readonly panelId: string;

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
    private readonly layerIds: Array<string>;

    /**
     * The constructor.
     *
     * @param hash { string }
     *   ...
     */
    public constructor(hash: string) {
        const pieces = this.convertHashToPieces(hash);
        this.panelId = this.extractPanelId(pieces);
        this.layerIds = this.extractLayerIds(pieces);
        this.element = Selector.element('panel').attribute('data-id', this.panelId).get();
        this.side = Extractor.side(this.element);
    }

    /**
     * ...
     *
     * @param elements { Array<string> | null }
     *   ...
     *
     * @return string
     */
    private extractPanelId(elements: Array<string> | null): string {
        return elements ? elements[0] : null;
    }

    /**
     * ...
     *
     * @param elements { Array<string> | null }
     *   ...
     *
     * @return Array<string>
     */
    private extractLayerIds(elements: Array<string> | null): Array<string> {
        return elements ? elements.slice(1) : null;
    }

    /**
     * ...
     *
     * @param hash { string }
     *   ...
     *
     * @return Array<string>
     */
    private convertHashToPieces(hash: string): Array<string> {
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
     * @type boolean
     */
    public isExistsPanel(): boolean {
        return this.element !== null;
    }

    /**
     * ...
     *
     * @type string
     */
    public getPanelId(): string {
        return this.panelId;
    }

    /**
     * ...
     *
     * @type C.side
     */
    public getSide(): C.side {
        return this.side;
    }
}

export default Target;
